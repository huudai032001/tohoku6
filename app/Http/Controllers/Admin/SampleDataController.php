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

use App\Models\Sample;

class SampleDataController extends Controller {

    protected $modelClass = Sample::class;
    // protected $modelName;
    // protected $modelSlug;
    
    // protected $viewBase;
    // protected $routeBase;

    // protected $enableSearch = false;
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
        
        // $dataTable->addSimpleColumn('email', __('common.email'));
        // $dataTable->addColumn('role', __('common.common'), function ($item)
        // {
        //     return $item->name;
        // });
    }

    // protected function indexQuery($query){

    // }

    protected function search($query, $searchString) {
        // $query->where('sample_field', 'like', $searchString);
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
            // new Form\Text([
            //     'name' => 'sample_field',
            //     'label' => __('sample_field.sample_field'),
            //     'required' => true,
            //     'data' => $dataItem->sample_field
            // ]),
            
        ]);
    }

    public function ruleEdit($item)
    {
        return [
            //'sample_field' => ['required', 'max:255']
        ];
    }

    protected function saveNewOrUpdate(Request $request, $item)
    {
        // $item->sample_field = $request->input('sample_field');
        // $item->save();
    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}