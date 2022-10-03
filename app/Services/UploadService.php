<?php 
namespace App\Services;

use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class UploadService
{
    public function handleUploadFile($file, $path = '')
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
            $result['msg'] = __('message.file_type_not_allowed');
            return $result;
        }

        $file_org_name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $save_as_name = $file_org_name;

        // $dup_file_name_count = 0;        

        // while (Upload::where('folder_path', $path)->where('name', $save_as_name)->first()) {
        //     $dup_file_name_count += 1;
        //     $save_as_name = $file_org_name .'('.$dup_file_name_count.')';            
        // }

        \DB::beginTransaction();
        try {
            
            $data = new Upload;
            $data->name = $save_as_name;            

            $data->extension = $file->extension();
            $data->file_name = $file->hashName();
            $data->mime_type = $file->getMimeType();
            $data->file_size = $file->getSize();
            $data->folder_path = $path;

            $file_info = getimagesize($file);
            list($original_width, $original_height) = $file_info;

            $data_file_info = [
                'width' => $original_width,
                'height' => $original_height,
                'versions' => []
            ];
            
            $versions = [
                'thumbnail' => [
                    'adapt_width' => 256,
                    'adapt_height' => 256,
                    'crop' => false  
                ],
                'small' => [
                    'adapt_width' => 640,
                    'adapt_height' => 640,
                    'crop' => false  
                ],
                'medium' => [
                    'adapt_width' => 1280,
                    'adapt_height' => 1280,
                    'crop' => false
                ],               
                'large' => [
                    'adapt_width' => 1920,
                    'adapt_height' => 1920,
                    'crop' => false
                ],
            ];

            $versions_file = [];

            $pathinfo = pathinfo($data->file_name);

            foreach ($versions as $version_name => $version) {
                if($version['crop']) {

                    if ($original_width > $version['adapt_width'] || $original_height > $version['adapt_height']) {

                        $versions_file[$version_name]['stream_data'] = Image::make($file)->fit($version['adapt_width'], $version['adapt_height'], function ($constraint) {
                            $constraint->upsize();
                        });

                    } else {
                        continue;
                    }

                } elseif ($version_name == 'thumbnail') {

                    if ($original_width > $version['adapt_width'] || $original_height > $version['adapt_height']) {

                        $versions_file[$version_name]['stream_data'] = Image::make($file)->resize($version['adapt_width'], $version['adapt_height'], function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

                    } else {
                        continue;
                    }                    

                } elseif ($original_width > $version['adapt_width'] && $original_height > $version['adapt_height']) {

                    $r_width = $original_width / $version['adapt_width'];
                    $r_height = $original_height / $version['adapt_height'];

                    if ($r_width > $r_height) {
                        $versions_file[$version_name]['stream_data'] = Image::make($file)->resize(null, $version['adapt_height'], function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    } else {
                        $versions_file[$version_name]['stream_data'] = Image::make($file)->resize($version['adapt_width'], null, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });
                    }

                } else {
                    continue;
                }               



                $versions_file[$version_name]['file_name'] = sprintf(
                    '%s-%s.%s',
                    $pathinfo['filename'],
                    $version_name,
                    $data->extension
                );  

                // bug: filesize() return original file size
                $data_file_info['versions'][$version_name] = [
                    'width' => '',
                    'height' => '',                        
                    'file_name' => $versions_file[$version_name]['file_name']
                ];
            }           
              

            $file->storePublicly($data->folder_path ?: '/', 'public');            

            foreach ($versions_file as $version_name => $version_file) {
                
                
                if (!empty($version_file['stream_data']) && !empty($version_file['file_name'])) {
                    
                    if ($data->folder_path) {
                        $filePath = $data->folder_path . '/' . $version_file['file_name'];
                    } else {
                        $filePath = $version_file['file_name'];
                    }
                    
                    Storage::disk('public')->put($filePath, $version_file['stream_data']->stream(), 'public');

                    $data_file_info['versions'][$version_name]['width'] = Image::make(Storage::disk('public')->readStream($filePath))->width();
                    $data_file_info['versions'][$version_name]['height'] = Image::make(Storage::disk('public')->readStream($filePath))->height();
                    
                }
            }
            $data->file_info = $data_file_info;

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