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
use App\Models\Category_event;
use App\Models\Category;
use App\Models\Favorite;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Form;

use App\Models\Event;

class EventController extends CommonDataController {

    protected $modelClass = Event::class;
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
        $dataTable->addSimpleColumn('location', 'Location');
        $dataTable->addSimpleColumn('time_start', 'Time start');
        $dataTable->addSimpleColumn('intro', 'Intro');

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
            new Form\date([
                'name' => 'time_start',    
                'type'=>'datetime-local',            
                'label' => 'Time Start',
                'required' => false,
                'data' => $dataItem->time_start
            ]),
            new Form\Text([
                'name' => 'intro',                
                'label' => 'Intro',
                'required' => false,
                'data' => $dataItem->intro
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
            new Form\Checkbox([
                'name' => 'category[]',
                'label' => 'Category',
                'options' => [
                    1 => 'グルメ',
                    2 => 'ショッピング',
                    3 => '宿泊',
                    4 => '体験',
                    5 => '自然',
                    6 => 'SNS映え',
                    7 => '歴史'
                ],
                'data' => $dataItem->category,
                'inline' => true
            ]),
        ]);
        $form->addGroups([
            new Form\Select([
                'name' => 'location',
                'label' => 'Location',
                'options' => [
                    'Akita'=>'Akita',
                    'Aomori'=>'Aomori',
                    'Fukushima'=>'Fukushima',
                    'Iwate'=>'Iwate',
                    'Miyagi'=>'Miyagi',
                    'Yamagate'=>'Yamagate',
                ],
                'required' => true,
                'data' => $dataItem->status
            ])
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
        if($alias == ""){
            $alias = $request->input('name');
        }
        $arr_cate = $request->input('category');

        $item->name = $request->input('name');
        $item->intro = $request->input('intro');
        $item->time_start = $request->input('time_start');
        $item->location = $request->input('location');
        $item->image_id = $request->input('image');
        $item->images_id = $request->input('images');
        $item->favorite = 0;
        $item->count_comment = 0;
        $item->author = Auth::user()->id;
        // $item->category = implode(',',$request->input('category'));
        $item->location = $request->input('location');
        $item->alias = $alias;

        $item->save();

        $category = new Category_event();
        for($i = 0; $i < count($arr_cate);$i++){
            $category->event_id = $item->id;
            $category->category_id = $arr_cate[$i];
            $category->save();
        }

        $favorite = new Favorite();
        $favorite->user_id = Auth::user()->id;
        $favorite->posts_id = $item->id;
        $favorite->type_posts = 2;
        $favorite->save();
    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}