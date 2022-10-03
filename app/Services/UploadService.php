<?php 
namespace App\Services;

use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class UploadService
{
    public function handleUploadFile($file)
    {
        $result = [
            'success' => false,
            'error' => false,
            'msg' => '',
            'file_info' => null
        ];
        
        // sleep(1);
        // return $this->fakeResult();

        $is_image = substr($file->getMimeType(), 0, 5) == 'image';
        if (!$is_image) {
            $result['msg'] = 'This file type is not allowed.';
            return $result;
        }

        \DB::beginTransaction();
        try {
            
            $data = new Upload;
            $data->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $data->extension = $file->extension();
            $data->file_name = $file->hashName();
            $data->mime_type = $file->getMimeType();
            $data->file_size = $file->getSize();

            $file_info = getimagesize($file);
            list($original_width, $original_height) = $file_info;

            $data_file_info = [
                'width' => $original_width,
                'height' => $original_height,
                'versions' => []
            ];
            
            $versions = [
                'thumbnail' => [
                    'max_width' => 256,
                    'max_height' => 256   
                ],
                'medium' => [
                    'max_width' => 512,
                    'max_height' => 512   
                ],
                'large' => [
                    'max_width' => 1200,
                    'max_height' => 1200   
                ],
            ];            

            $pathinfo = pathinfo($data->file_name);

            foreach ($versions as $version_name => &$version) {
                if ($original_width > $version['max_width'] || $original_height > $version['max_height']) {

                    $version['file'] = Image::make($file)->resize($version['max_width'], $version['max_height'], function ($constraint) {
                        $constraint->aspectRatio();
                        $constraint->upsize();
                    });

                    $version['max_width'] = 100;

                    $version['file_name'] = sprintf(
                        '%s-%s.%s',
                        $pathinfo['filename'],
                        $version_name,
                        $data->extension
                    );  
                    
                    // bug: filesize() return original file size
                    $data_file_info['versions'][$version_name] = [
                        'width' => '',
                        'height' => '',                        
                        'file_name' => $version['file_name']
                    ];

                }
            }           
            

            $data->file_info = $data_file_info;

            $file->storePublicly('/', 'public');

            foreach ($versions as $version_name => $version) {
                if (!empty($version['file']) && !empty($version['file_name'])) {
                    Storage::disk('public')->put($version['file_name'], $version['file']->stream(), 'public');
                }
            }

            $data->save();            
            \DB::commit();

            $result['success'] = true;
            $result['file_info'] = $data->getJsData();

        } catch (\Exception $e) {
            
            \DB::rollBack();
            
            \Log::error(sprintf(
                '%s (%s line %s)',
                $e->getMessage(),
                $e->getFile(),
                $e->getLine()
            )); 
            $result['error'] = 'true';
            $result['msg'] = 'System error';     
        }
        
        return $result;
    }

    protected function fakeResult()
    {
        $success = rand(0, 1);
        //$success = 1;
        //$error = rand(0, 1);
        $error = 0;
        return [
            'success' => $success == 1 ? true : false,
            'error' => $error == 1 ? true : false,
            'msg' => 'Error message.',
            'file_info' => []
        ];
    }
}