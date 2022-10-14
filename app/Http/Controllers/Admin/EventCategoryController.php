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

use App\Models\EventCategory;
use App\Models\Upload;



class EventCategoryController extends HierachyTaxonomyController {

    protected $modelClass = EventCategory::class;
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
    //     return $this->saveNewOrUpdate($request, $item);
    // }


    protected function initFormEdit($form, $dataItem)
    {
        $form->addGroups([
            new Form\Text([
                'name' => 'name',
                'label' => __('common.name'),
                'required' => true,
                'data' => $dataItem->name
            ]),
            new Form\Text([
                'name' => 'slug',
                'label' => __('common.slug'),
                'data' => $dataItem->slug
            ]),

            new Form\Model([
                'name' => 'parent',
                'label' => __('common.parent'),
                'data' => $dataItem->parent_id,
                'model' => EventCategory::class,
                'hierachy' => true,
                'exclude' => $dataItem->id
            ]),

            new Form\TextEditor([
                'name' => 'description',
                'label' => __('common.description'),
                'data' => $dataItem->description,
            ]),
        ]);
    }

    public function ruleEdit($item)
    {
        return [
            'name' => ['required', 'max:255']
        ];
    }

    protected function saveNewOrUpdate(Request $request, $item)
    {
        
        $item->taxonomy = 'category';
        $item->name = $request->input('name');
        if (!$item->slug) {
            $item->slug = Helper::makeSlug($item->name);
        }
        $item->parent_id = $request->input('parent');
        $item->description = $request->input('description');
        $item->save();
    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}