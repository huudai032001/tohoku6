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
use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Form;

use App\Models\Goods;

class GoodsController extends CommonDataController {

    protected $modelClass = Goods::class;
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
        $dataTable->addSimpleColumn('name', 'Name');
        $dataTable->addSimpleColumn('point', 'Point');
        $dataTable->addSimpleColumn('intro', 'Intro');
        // $dataTable->addSimpleColumn('location', 'Dia Diem');

        // $dataTable->addColumn('role', __('common.common'), function ($item)
        // {
        //     return $item->name;
        // });
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
                'name' => 'intro',                
                'label' => 'Intro',
                'required' => false,
                'data' => $dataItem->intro
            ]),
            new Form\Text([
                'name' => 'point',                
                'label' => 'Point',
                'required' => true,
                'data' => $dataItem->point
            ]),
            new Form\Text([
                'name' => 'location',                
                'label' => 'Location',
                'required' => true,
                'data' => $dataItem->location
            ]),
            new Form\Upload([
                'name' => 'image',
                'label' => 'Image',
                'multiple' => false,
                'required' => true,
                'data' => $dataItem->image_id
            ]),
            new Form\Upload([
                'name' => 'images',
                'label' => 'Images',
                'multiple' => true,
                'required' => true,
                'data' => $dataItem->images_id
            ]),
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
        $alias = Str::slug($request->input('name'), "-");

        $item->name = $request->input('name');
        $item->intro = $request->input('intro');
        $item->point = $request->input('point');
        $item->author = Auth::user()->id;
        $item->image_id = $request->input('image');
        $item->alias = $alias;
        $item->location = $request->input('location');

        $item->images_id = $request->input('images');
        $item->save();
    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}