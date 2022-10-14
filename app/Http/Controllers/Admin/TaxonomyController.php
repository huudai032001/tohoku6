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

class TaxonomyController extends CommonDataController {

    protected $viewBase = 'admin.data-management.common-taxonomy.';    

    protected $enableSearch = true; 

    protected $itemsPerPage = 20;

    protected $sort = 'oldest'; 

    protected function search($query, $searchString) {
        $query->where('name', 'like', $searchString);
    }

    protected function initDataTable($dataTable) {        

        $dataTable->addColumn('name', __('common.name'), function ($item)
        {
            return $item->getName();
        });

        if ($this->modelClass::isHierachy()) {
            $dataTable->addColumn('children', __('common.sub_category'), function ($item)
            {
                if ($item->children->isNotEmpty()) {
                    $html = '';
                    foreach ($item->children as $child_item) {
                        $html .= sprintf('<div>%s<div>',                        
                            $child_item->getName()
                        );
                    }
                    return $html;
                }
            });            

            $dataTable->addColumn('navigation', '', function ($item)
            {
                $html = '';
                
                if ($item->children->isNotEmpty()) {
                    $html .= sprintf('<a class="btn btn-secondary btn-sm" href="%s">%s <i class="icon-arrow-right8"></i></a',
                        request()->fullUrlWithQuery(['parent' => $item->id]),
                        __('common.children_item', ['item' => $this->modelClass::getModelName()])
                    );

                }
                return $html;
            });
        }

    }

    protected function delete($dataItem)
    {
        $dataItem->items()->sync([]);
        $dataItem->delete();
    }
    
}