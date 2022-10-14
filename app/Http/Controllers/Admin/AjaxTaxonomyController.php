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

class AjaxTaxonomyController extends Controller {

    public function fetchItems(Request $request)
    {
        $result = [
            'success' => false,
            'error' => false,
            'msg' => '',
            'data' => []
        ];

        $modelClass = $request->input('model_class');
        if ($modelClass) {
            if ($modelClass::isHierachy()) {
                $items = $modelClass::with('children')->whereNull('parent_id')->get();
            } else {
                $items = $modelClass::take(1000)->get();
            }
            $data = [];
            foreach($items as $item) {
                $data[] = $this->getItemData($item, $modelClass::isHierachy());
            }            
        }
        $result['success'] = true;
        $result['data'] = $data;

        return $result;
    }

    public function getItemData($item, $getChildren = false)
    {
        $data = [
            'id' => $item->id,
            'name' => $item->getName(),
            'parent_id' => $item->parent_id,
            'children' => []
        ];
        if ($getChildren && $item->children->isNotEmpty()) {
            $item->children->load('children');
            
            foreach ($item->children as $childItem) {
                $data['children'][] =  $this->getItemData($childItem, true);
            }            
        }
        return $data;
    }

}