<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Upload;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class UploadController
{
    // public function index()
    // {        
    //     return view('admin.upload.index');
    // }

    public function getFileManagerItems(Request $request)
    {
        $files = Upload::orderBy('id', 'desc')->cursorPaginate(32);
        $response_data = [];
        $items = [];
        if (!$files->isEmpty()) {            
            foreach ($files as $file) {
                $items[] = $file->getJsData();
            }
                    
            $response_data['has_more'] = $files->hasMorePages();
            if ( $files->hasMorePages() ) {
                $response_data['next_cursor'] = $files->nextCursor()->encode();
            }
        }
        $response_data['items'] = $items;
        return response()->json($response_data);
    }


    public function handleAjaxUpload(Request $request) {

        $file = $request->file('upload_file');

        $uploadService = new \App\Services\UploadService;

        return response()->json($uploadService->handleUploadFile($file));
    }
    
}