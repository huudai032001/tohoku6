<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;

use App\Models\Page;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


class PageController extends CRUDController
{
    protected $modelClass = Page::class;

    // protected function getIndexDataItems(Request $request) {
    //     $query = $this->modelClass::query();
    //     if($request->filled('trash')) {
    //         $query->onlyTrashed();
    //     }
    //     if($request->filled('search')) {
    //         $search = '%' . trim($request->input('search')) . '%';
    //         $query->where(function ($query) use ($search)
    //         {
    //             $query->where('name', 'like', $search);                
    //         });
    //     }
        
    //     $order =  $request->filled('order') ? $request->input('order') : 'newest';
        
    //     switch($order) {
    //         case 'oldest':
    //             $query->orderBy('id', 'asc');   
    //             break;
            
    //         case 'newest':
    //             $query->orderBy('id', 'desc');   
    //             break;
    //     }
    //     $data = $query->paginate(20)->withQueryString();
    //     return $data;
    // }
    
    protected function initDataTable($dataTable)
    {
        $dataTable->addPresetColumns(['name', 'slug', 'image']);
        
    }

    protected function editItem(Request $request, $data) {
        
        $rules = [
            'name' => ['required']
        ];

        $validated = $request->validate($rules);

        $data->name = $request->input('name');
        if ($request->input('slug')) {
            $data->slug = $request->input('slug');
        } else {
            $data->slug = \FormHelper::makeSlug($data->name);            
        }
        $data->content = $request->input('content');
        $data->image_id = $request->input('image');
        //$data->category_id = $request->input('category');
        
        if(!$data->id) {          
            $data->status = 1;
        } 

        $data->save();

    }

}