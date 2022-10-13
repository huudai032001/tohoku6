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
use App\Models\Comment;
use App\Models\Favorite;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use App\Form;

use App\Models\Event;

class CommentController extends CommonDataController {

    protected $modelClass = Comment::class;
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
        $dataTable->addSimpleColumn('name_user', 'User Name');
        $dataTable->addColumn('Spot Name', __('Spot Name'), function ($item)
        {
            return $item->spotName->name;
        });
        $dataTable->addSimpleColumn('content', 'Content');

        // $dataTable->addColumn('role', __('common.common'), function ($item)
        // {
        //     return $item->name;
        // });
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
    //     return $this->updateItem($request, $item);
    // }


    protected function initFormEdit($form, $dataItem)
    {
        $form->addGroups([
            new Form\Text([
                'name' => 'content',                
                'label' => 'Content',
                'required' => true,
                'data' => $dataItem->content
            ]),

        ]);
    }

    public function ruleEdit($item)
    {
        return [
            'content' => ['required', 'max:255']
        ];
    }

    protected function updateItem(Request $request, $item)
    {
        dd($request->input('spot_id'));
        $item->content = $request->input('content');
        $item->save();


    }    

    // protected function delete($dataItem)
    // {
    //     $dataItem->delete();
    // }

}