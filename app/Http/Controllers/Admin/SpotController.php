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
use App\Models\Category_spot;

use App\Models\Spot;
use App\Models\Upload;
use App\Models\Notification;
use App\Models\Favorite;


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
        $dataTable->addLabelColumn('status','Status', function ($item)
        {
            return [$item->status, $item->statusName()];
        },[
            'active' => 'badge badge-success'
        ]);
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
                'data' => $dataItem->address
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
                'name' => 'status',
                'label' => 'Status',
                'options' => Spot::statusList(),
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
        $arr_cate = $request->input('category');
        $alias = Str::slug($request->input('name'), "-");
        if($alias == ""){
            $alias = $request->input('name');
        }
        // dd($alias);
        $item->name = $request->input('name');
        $item->location = $request->input('location');
        $item->intro = $request->input('intro');
        $item->address = $request->input('address');
        // $item->category = $request->input('category');
        $item->image_id = $request->input('image');
        $item->images_id = $request->input('images');
        // $item->category = implode(',',$request->input('category'));
        $item->status = $request->input('status');
        $item->favorite = 0;
        $item->count_comment = 0;
        $item->author = Auth::user()->id;
        $item->alias = $alias;
        $item->save();
        $category = new Category_spot();
        for($i = 0; $i < count($arr_cate);$i++){
            $category->spot_id = $item->id;
            $category->category_id = $arr_cate[$i];
            $category->save();
        }

        $noti = new  Notification();
        $noti->posts_id = $item->id;
        $noti->user_id = $item->author;
        $noti->feedback = "承認された投稿";
        // $noti->type_posts = "spots";
        $noti->save();

        $favorite = new Favorite();
        $favorite->user_id = Auth::user()->id;
        $favorite->posts_id = $item->id;
        $favorite->type_posts = 1;
        $favorite->save();

    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}