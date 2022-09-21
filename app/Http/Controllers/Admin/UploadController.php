<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Upload;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

class UploadController
{
    public function index()
    {        
        return view('admin.upload.index');
    }

    public function getFileManagerItems(Request $request)
    {
        $files = Upload::orderBy('id', 'desc')->cursorPaginate(32);
        $response_data = [];
        $items = [];
        if (!$files->isEmpty()) {            
            foreach ($files as $file) {
                $items[] = $file->getJSData();
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

        $result = \App\API\FileUpload::handleUploadFile($file);

        $responseData = [
            'success' => $result->success,
            'error_msg' => implode(', ', $result->messages),
            'fatal_error' => $result->error,            
            'file_data' => $result->success ? $result->getData('model')->getJSData() : null
        ];

        return response()->json($responseData);
    }
    
}