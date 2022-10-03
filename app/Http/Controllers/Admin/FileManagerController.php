<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Upload;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

use App\Misc\Helper;

class FileManagerController
{
    public function fileLibrary()
    {        
        return view('admin.file-library');
    }

    public function fetchData(Request $request)
    {       
        $return = [];
        $dataToLoad = $request->input('data_to_load') ?: [];
        foreach($request->input('data_to_load') as $dataType) {
            switch ($dataType) {
                case 'file':
                    $return = array_merge($return, $this->getFiles($request));
                    break;
                
                case 'sub_folder':
                    $return = array_merge($return, $this->getSubfolders($request));
                    break;
              
            }
        }
        return response()->json($return);
    }

    protected function getFiles(Request $request)
    {   
        $query = Upload::query();
        $query->where('folder_path', $request->input('current_path'));
        if ($request->has('search')) {
            $query->where('name', 'like', Helper::makeSearchString($request->input('search')));            
        }
        
        $files = $query->orderBy('id', 'desc')->cursorPaginate(24);

        $data = [];
        $items = [];
        if (!$files->isEmpty()) {            
            foreach ($files as $file) {
                $items[] = $file->getJsData();
            }
        }
        $data['has_more'] = $files->hasMorePages();
        $data['next_cursor'] = $files->hasMorePages() ? $files->nextCursor()->encode() : '';        
        $data['files'] = $items;
        return $data;
    }

    public function deleteFile(Request $request)
    {
        $return = [
            'success' => false
        ];        

        if (($file_id = $request->input('file_id')) && $file = upload::find($file_id)) {

            if(!empty($versions =  $file->getJson('file_info', 'versions' ))) {
                foreach($versions as $versionName => $versionInfo) {
                    \Storage::disk('public')->delete($file->getPath($versionName));
                }
                
            }
            \Storage::disk('public')->delete($file->getPath());

            $file->delete();

            $return['success'] = true; 
        }        

        return $return;
    }


    protected function getSubfolders(Request $request)
    {
        $data = [];
        $data['sub_folders'] = [];

        $data['sub_folders'] = \Storage::disk('public')->directories($request->input('current_path'));

        return $data;
    }

   

    public function createFolder(Request $request)
    {
        $return = [
            'success' => false
        ];
        $newFolderPath = implode('/', [
            $request->input('current_path'),
            $request->input('folder_name')
        ]);        

        if (!\Storage::disk('public')->exists($newFolderPath)) {
            \Storage::disk('public')->makeDirectory($newFolderPath);
            
            $return['success'] = true;  
            $return['sub_folders'] = \Storage::disk('public')->directories($request->input('current_path'));                      
        } else {
            $return['message'] = 'Folder exists !';
        }
        return $return;
    }

    public function deleteFolder(Request $request)
    {
        $return = [
            'success' => false
        ];
             
        $folder = $request->input('folder_path');
        $return['message'] = 'Folder contains files. Can not delete !';

        if ($folder) {
            if (
                empty(\Storage::disk('public')->files($folder))
                && empty(\Storage::disk('public')->directories($folder))
            ) {
                \Storage::disk('public')->deleteDirectory($folder);
                $return['success'] = true;  
                $return['sub_folders'] = \Storage::disk('public')->directories($request->input('current_path'));                      
            } else {
                $return['message'] = 'Folder contains files. Can not delete !';
            }
        }        
        
        return $return;
    }


    public function upload(Request $request) {

        $file = $request->file('upload_file');
        $path = $request->input('current_path');

        $uploadService = new \App\Services\UploadService;

        return response()->json($uploadService->handleUploadFile($file, $path));
    }
    
}