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

class HierachyTaxonomyController extends TaxonomyController {


    protected $sort = 'oldest';
   

    protected function indexQuery($request){
        $query = parent::indexQuery($request);
        if (!$request->input('search')) {

            if ($request->input('parent')) {
                $query->where('parent_id', $request->input('parent'));
            } else {
                $query->whereNull('parent_id');
            }

        }
        return $query;
    }
   
    
}