<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;

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
use App\Models\Report;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Form;

use App\Models\Event;

class ReportController extends CommonDataController {

    protected $modelClass = Report::class;
    // protected $modelName;
    // protected $modelSlug;
    
    // protected $viewBase;
    // protected $routeBase;

    protected $enableSearch = true;
    // protected $enableCreate = true;
    // protected $enableEdit = true;
    // protected $enableView = true;
    // protected $enableDelete = true;
    // protected $enableTrash = false;
    // protected $enableRestore = false;    

    // protected $itemsPerPage = 10;

    // protected $sort = 'newest';   

    public function moreGeneralActions() {
        return [];
    }

    public function moreItemActions($item = null) {
        return [];
    }

    public function moreBulkActions() {
        return [
            // 'change-status' => [
            //     'label' => 'Change status'
            // ],
        ];
    }
    

    protected function initDataTable($dataTable) {
        $dataTable->addColumn('User Name', __('common.user_name'), function ($item)
        {
        
            return $item->userName->name;
        });
        $dataTable->addSimpleColumn('content', __('common.report_content'));
        $dataTable->addSimpleColumn('object_type',__('common.object_type'));
        $dataTable->addSimpleColumn('status',__('common.status'));

    }

    // protected function indexQuery($query){

    // }

    protected function search($query, $searchString) {
        $query->where('content', 'like', $searchString);
    }

    // protected function sort($query, $order) {        
    //     switch ($order) {
    //         case 'newest':
    //             $query->orderBy('id', 'desc');
    //             break;

    //         case 'oldest':
    //             $query->orderBy('id', 'asc');
    //             break;            
    //     }     
    // }

    // public function ruleCreate($item)
    // {
    //     return $this->ruleEdit($item);
    // }

    
    // protected function saveNew(Request $request, $item)
    // {
    //     return $this->saveNewOrUpdate($request, $item);
    // }


    protected function initFormEdit($form, $dataItem)
    {
        $form->addGroups([
            new Form\Select([
                'name' => 'status',
                'label' => __('common.status'),
                'options' => Report::reportList(),
                'required' => true,
                'data' => $dataItem->status
            ])

        ]);
    }

    public function ruleEdit($item)
    {
        return [
            'status' => ['required']
        ];
    }

    protected function saveNewOrUpdate(Request $request, $item)
    {
 
        $item->status = $request->input('status');
        $item->save();

    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}