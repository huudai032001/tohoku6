<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use App\Misc\DataTable;
use App\Misc\HTML;
use App\Misc\FlashMsg;
use App\Misc\Helper;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Form;

class CommonDataController extends Controller {

    protected $modelClass;
    protected $modelName;
    protected $modelSlug;
    
    protected $viewBase;
    protected $routeBase;

    protected $enableSearch = false;
    protected $enableCreate = true;
    protected $enableEdit = true;
    protected $enableView = true;
    protected $enableDelete = true;
    protected $enableTrash = false;
    protected $enableRestore = false;    

    protected $itemsPerPage = 10;

    protected $hasTransactionError = false;

    protected $sort = 'newest';

    public function __construct()
    {        
        $this->modelName = $this->modelClass::getModelName();
        $this->modelSlug = Str::kebab(class_basename($this->modelClass));
        if (!$this->routeBase) {
            $this->routeBase = 'admin.' . $this->modelSlug . '.';
        }
        if (!$this->viewBase) {
            $this->viewBase = 'admin.data-management.' . $this->modelSlug . '.';
        }
        
        View::share('modelName', $this->modelName);
        View::share('modelSlug', $this->modelSlug);
        View::share('viewBase', $this->viewBase);
        View::share('routeBase', $this->routeBase);        

        View::share('controller', $this);
    }
    

    public function moreGeneralActions() {
        return [];
    }

    public function moreItemActions($item = null) {
        return [];
    }

    public function moreBulkActions() {
        return [];
    }
    

    public function getGeneralAction(Request $request, $action)
    {   
        $func = 'get' . Str::studly($action);
        return $this->callDynamicAction($action, $func, [$request]);
    }

    public function postGeneralAction(Request $request, $action)
    {
        $func = 'post' . Str::studly($action);
        return $this->callDynamicAction($action, $func, [$request]);
    }

    public function getItemAction(Request $request, $id, $action)
    {        
        $func = 'getItem' . Str::studly($action);
        return $this->callDynamicAction($action, $func, [$request, $id]);
    }

    public function postItemAction(Request $request, $id, $action)
    {        
        $func = 'postItem' . Str::studly($action);
        return $this->callDynamicAction($action, $func, [$request, $id]);
    }

    public function getBulkAction(Request $request)
    {        
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) || !is_array($ids)) {
            FlashMsg::addWarning(__('message.bulk_action_no_item_selected'));
            return redirect($this->backToIndexRoute());            
        }
        if (empty($action)) {
            FlashMsg::addWarning(__('message.bulk_action_no_item_selected'));
            return redirect($this->backToIndexRoute());      
        }

        $func = 'getBulk' . Str::studly($action);
        return $this->callDynamicAction($action, $func, [$request]);
    }

    public function postBulkAction(Request $request)
    {
        $ids = $request->input('ids');
        $action = $request->input('action');
        if (empty($ids) || !is_array($ids)) {
            FlashMsg::addWarning(__('message.bulk_action_no_item_selected'));
            return redirect($this->backToIndexRoute());            
        }
        if (empty($action)) {
            FlashMsg::addWarning(__('message.bulk_action_no_item_selected'));
            return redirect($this->backToIndexRoute());      
        }

        $func = 'postBulk' . Str::studly($action);
        return $this->callDynamicAction($action, $func, [$request]);
    }

    protected function callDynamicAction($action, $method, $args = [])
    {
        $checkFunc = Str::camel($action) . 'Able';

        if (
            method_exists($this, $method)
            && (!method_exists($this, $checkFunc) || call_user_func([$this, $checkFunc]))
        )
        { 
            return call_user_func_array([$this, $method], $args);                      
        } else {
            return $this->showErrorPage(__('message.invalid_request'));  
        }
    }

    protected function getView($views)
    {
        $array = [];
        $views = \Arr::wrap($views);

        foreach ($views as $view) {
            $array[] = $this->viewBase . $this->modelSlug . '.' . $view;            
        }
        foreach ($views as $view) {           
            $array[] = 'admin.data-management.base.' . $view;
        }

        return View::first($array);
    }

    protected function DBTransaction($func, $args = [])
    {
        DB::beginTransaction();        
        try {
            call_user_func_array($func, $args);            
            DB::commit();              
        } catch (\Exception $e) {
            DB::rollBack();
            $this->hasTransactionError = true;
            // FlashMsg::addError($e->getMessage());
            Log::error($e->getMessage());            
        }
    }

    protected function showErrorPage($errors)
    {        
        return view('admin.error')->with([
            'errorMessages' => $errors
        ]);
    }


    public function searchAble()
    {
        return $this->enableSearch;
    }

    public function createAble()
    {
        return $this->enableCreate;
    }

    public function editAble($item = null)
    {
        if ($item) {
            return $this->editAble() && $item->editAble();
        }
        return $this->enableEdit;
    }    

    public function viewAble($item = null)
    {
        return $this->enableView;
    }

    public function deleteAble($item = null)
    {
        if ($item) {
            return $this->deleteAble() && $item->deleteAble();
        }
        return $this->enableDelete;
    }

    public function trashAble($item = null)
    {
        if ($item) {
            return $this->trashAble() && $item->trashAble();
        }
        return $this->enableTrash;
    }

    public function restoreAble($item = null)
    {        
        if ($item) {
            return $this->restoreAble() && $item->restoreAble();
        }
        return $this->enableTrash && $this->enableRestore;
    }


    public function index(Request $request, $condition = null)
    {
        $query = $this->modelClass::query();

        // custom query conditions
        $this->indexQuery($query);

        // search
        if ($this->searchAble() && $request->filled('search')) {            
            $query->where(function ($query) use ($request)
            {
                $this->search($query, Helper::makeSearchString($request->input('search')));
            });            
        }

        // sort
        $this->sort($query, $request->input('sort', $this->sort));        

        $items = $query->paginate($this->itemsPerPage)->withQueryString();

        if($items->isEmpty() && $items->total() > 0 && $items->currentPage() > $items->lastPage()) {
            return redirect($request->fullUrlWithQuery(['page' => $items->lastPage()]));
        }

        $request->session()->put('routeRequestHistory.' . Route::currentRouteName(), $request->fullUrl());

        $dataTable = new DataTable();
        $this->initDataTable($dataTable);

        return $this->getView('index')->with([
            'dataList' => $items,                    
            'dataTable' => $dataTable,
            'pageTitle' => __('common.item_list', ['item' => $this->modelClass::getModelName()])
        ]);       
    }

    protected function initDataTable($dataTable) {}

    protected function indexQuery($query){}

    protected function search($query, $searchString) {}

    protected function sort($query, $order) {        
        switch ($order) {
            case 'newest':
                $query->orderBy('id', 'desc');
                break;

            case 'oldest':
                $query->orderBy('id', 'asc');
                break;            
        }        
    }    

    protected function backToIndexRoute()
    {
        return session('routeRequestHistory.' . $this->routeBase . 'index') ?: route($this->routeBase . 'index');
    }


    protected function getCreate(Request $request)
    {        
        $dataItem = new $this->modelClass;

        $form = new Form\Form;
        $this->initFormCreate($form, $dataItem);
        
        return $this->getView(['item-create', 'item-edit'])->with([
            'dataItem' => $dataItem,
            'form' => $form,
            'pageTitle' =>  __('common.create_item', ['item' => $this->modelClass::getModelName()])
        ]);
    }

    // Use the same form for Creating and Editing by default
    protected function initFormCreate($form, $dataItem)
    {
        $this->initFormEdit($form, $dataItem);
    }

    protected function postCreate(Request $request)
    {
        $dataItem = new $this->modelClass;        
        
        $form = new Form\Form;
        $this->initFormCreate($form, $dataItem);
        
        $request->validate($this->ruleCreate($dataItem));

        $this->DBTransaction([$this, 'saveNew'], [$request, $dataItem]);

        if($this->hasTransactionError) {
            FlashMsg::addError(__('message.unknown_error'));
            return back()->withInput();
        }

        FlashMsg::addSuccess(__('message.item_created', ['item' => $this->modelName]));
        return redirect()->route($this->routeBase . 'index', ['sort' => 'newest']);
    }

    public function ruleCreate($item)
    {
        return $this->ruleEdit($item);
    }

    
    protected function saveNew(Request $request, $item)
    {
        return $this->updateItem($request, $item);
    }


    protected function getItemView(Request $request, $id)
    {
        $dataItem = $this->modelClass::find($id);
        if (!$dataItem) {
            return $this->showErrorPage(__('message.data_not_found'));
        }       

        $form = new Form\Form;        
        $this->initFormEdit($form, $dataItem);
        
        return $this->getView('item-view')->with([            
            'form' => $form,
            'dataItem' => $dataItem,
            'pageTitle' => $this->modelClass::getModelName() . ' ID ' . $dataItem->id
        ]);        
    }  

    protected function getItemEdit(Request $request, $id)
    {
        $dataItem = $this->modelClass::find($id);
        if (!$dataItem) {
            return $this->showErrorPage(__('message.data_not_found'));
        }       
        
        $form = new Form\Form;        
        $this->initFormEdit($form, $dataItem);

        return $this->getView('item-edit')->with([            
            'dataItem' => $dataItem,
            'form' => $form,
            'pageTitle' => __('common.edit_item', ['item' => $this->modelClass::getModelName()])
        ]);
    }

    protected function postItemEdit(Request $request, $id)
    {   
        $dataItem = $this->modelClass::find($id);
        if (!$dataItem) {            
            return $this->showErrorPage(__('message.data_not_found'));
        }

        $form = new Form\Form;        
        $this->initFormEdit($form, $dataItem);

        $request->validate($this->ruleEdit($dataItem));

        $this->DBTransaction([$this, 'saveNew'], [$request, $dataItem]);

        if($this->hasTransactionError) {
            FlashMsg::addError(__('message.unknown_error'));
            return back()->withInput();
        }

        FlashMsg::addSuccess(__('common.item_updated', ['item' => $this->modelName]));

        return redirect()->route(                
            $this->routeBase . 'item-action',
            [
                'action' => $this->viewAble() ? 'view' : 'edit',
                'id' => $dataItem->id
            ]
        );
    }

    protected function initFormEdit($form, $dataItem)
    {

    }

    public function ruleEdit($item)
    {
        return [];
    }

    protected function updateItem(Request $request, $item)
    {
        
    }
    

    protected function getBulkDelete(Request $request)
    {
        $dataList = $this->modelClass::find($request->input('ids'));
        
        return $this->getView('bulk-delete')->with([
            'dataList' => $dataList,
            'pageTitle' => __('common.delete_item', ['item' => $this->modelName])
        ]);
    }

    protected function postBulkDelete(Request $request)
    {        
        $dataList = $this->modelClass::find($request->input('ids'));
        
        $count = 0;
        foreach($dataList as $dataItem) 
        {
            $this->DBTransaction([$this, 'delete'], [$dataItem]);
            if($this->hasTransactionError) {                
                FlashMsg::addError(__('message.unknown_error'));
                return back()->withInput();
            } else {
                $count++;
            }            
        }
        if ($count > 0) {
            FlashMsg::addSuccess(__('message.count_items_deleted', ['count' => $count]));
        }        
        
        return redirect($this->backToIndexRoute());
    }   

    protected function delete($dataItem)
    {
        $dataItem->delete();
    }

    
    
}