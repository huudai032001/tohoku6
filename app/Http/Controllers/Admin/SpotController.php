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

use App\Models\Spot;
use App\Models\Upload;


class SpotController extends CommonDataController {

    protected $modelClass = Spot::class;
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
        $dataTable->addSimpleColumn('name', 'Ten');
        $dataTable->addSimpleColumn('location', 'Dia Diem');
        $dataTable->addSimpleColumn('category', 'Danh muc');
        $dataTable->addSimpleColumn('intro', 'Mo ta');
        $dataTable->addSimpleColumn('address', 'Address');
        // $dataTable->addSimpleColumn('upload', 'upload');

        // $dataTable->addSimpleColumn('location', 'Dia Diem');

        
    }

    // protected function indexQuery($query){

    // }

    protected function search($query, $searchString) {
        $query->where('name', 'like', $searchString);
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
    //     return $this->updateItem($request, $item);
    // }


    protected function initFormEdit($form, $dataItem)
    {
        $form->addGroups([
            new Form\Text([
                'name' => 'name',                
                'label' => 'Name',
                'required' => true,
                'data' => $dataItem->name
            ]),
            new Form\Text([
                'name' => 'location',                
                'label' => 'Location',
                'required' => false,
                'data' => $dataItem->location
            ]),
            new Form\Text([
                'name' => 'intro',                
                'label' => 'Intro',
                'required' => false,
                'data' => $dataItem->intro
            ]),
            new Form\Text([
                'name' => 'address',                
                'label' => 'Address',
                'required' => false,
                'data' => $dataItem->category
            ]),
            new Form\Upload([
                'name' => 'image',
                'label' => 'Image',
                'multiple' => false,
                'data' => $dataItem->image_id
            ]),
            new Form\Upload([
                'name' => 'images',
                'label' => 'Image',
                'multiple' => true,
                'data' => $dataItem->images_id
            ]),
            // cate
            // new Form\Text([
            //     'name' => 'category',                
            //     'label' => '宿泊',
            //     'value'=> '1',
            //     'type' => 'checkbox',            
            //     'required' => false,
            //     'data' => $dataItem->category
            // ]),
            // new Form\Text([
            //     'name' => 'category', 
            //     'type' => 'checkbox',            
            //     'label' => 'グルメ',
            //     'required' => false,
            //     'data' => $dataItem->category
            // ]),
            // new Form\Text([
            //     'name' => 'category',    
            //     'type' => 'checkbox',            
            //     'label' => 'ショッピング',
            //     'required' => false,
            //     'data' => $dataItem->category
            // ]),
            // new Form\Text([
            //     'name' => 'category',   
            //     'type' => 'checkbox',            
            //     'label' => '自然',
            //     'required' => false,
            //     'data' => $dataItem->category
            // ]),
            // new Form\Text([
            //     'name' => 'category',  
            //     'type' => 'checkbox',            
            //     'label' => '体験',
            //     'required' => false,
            //     'data' => $dataItem->category
            // ]),
            // new Form\Text([
            //     'name' => 'category',    
            //     'type' => 'checkbox',            
            //     'label' => '歴史',
            //     'required' => false,
            //     'data' => $dataItem->category
            // ]),
            // new Form\Text([
            //     'name' => 'category',      
            //     'type' => 'checkbox',            
            //     'label' => 'SNS映え',
            //     'required' => false,
            //     'data' => $dataItem->category
            // ])
        ]);
    }

    public function ruleEdit($item)
    {
        return [
            'name' => ['required', 'max:255']
        ];
    }

    protected function updateItem(Request $request, $item)
    {
        // var_dump($item->category);
        // die;
        $item->name = $request->input('name');
        $item->location = $request->input('location');
        $item->intro = $request->input('intro');
        $item->address = $request->input('address');
        $item->category = $request->input('category');
        $item->image_id = $request->input('image');
        $item->images_id = $request->input('images');
        $item->save();
    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}