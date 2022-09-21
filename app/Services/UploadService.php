<?php 
namespace App\Services;

use App\Models\Upload;
use Illuminate\Support\Facades\DB;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;


class UploadService
{
    public static function handleUploadFile($file)
    {
        $result = new APIResult;

        $is_image = substr($file->getMimeType(), 0, 5) == 'image';
        if (!$is_image) {
            return $result->fail('This file type is not allowed.');
        }

        \DB::beginTransaction();
        try {
            
            $data = new Upload;
            $data->name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $data->extension = $file->extension();
            $data->file_name = $file->hashName();
            $data->mime_type = $file->getMimeType();
            $data->size = $file->getSize();

            $file_info = getimagesize($file);
            list($width, $height) = $file_info;

            $fields = [
                'width' => $width,
                'height' => $height                    
            ];
            

            $pathinfo = pathinfo($data->file_name);

            $thumbnail = Image::make($file)->resize(256, 256, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $thumbnail_file_name = $pathinfo['filename'] . '-thumbnail.' . $data->extension;

            $medium = Image::make($file)->resize(512, 512, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $medium_file_name = $pathinfo['filename'] . '-medium.' . $data->extension;

            $large = Image::make($file)->resize(1200, 1200, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $large_file_name = $pathinfo['filename'] . '-large.' . $data->extension;

            // bug: filesize() return original file size
            $fields['sizes'] = [
                'thumbnail' => [
                    'width' => '',
                    'height' => '',                        
                    'file_name' => $thumbnail_file_name
                ],
                'medium' => [
                    'width' => '',
                    'height' => '', 
                    'file_name' => $medium_file_name
                ],
                'large' => [
                    'width' => '',
                    'height' => '',
                    'file_name' => $large_file_name
                ]
            ];

            $data->fields = $fields;

            $file->storePublicly('/', 'public');
            Storage::disk('public')->put($thumbnail_file_name, $thumbnail->stream(), 'public');
            Storage::disk('public')->put($medium_file_name, $medium->stream(), 'public');
            Storage::disk('public')->put($large_file_name, $large->stream(), 'public');

            $data->save();

        $result->addData('model', $data);

            \DB::commit();

        } catch (\Exception $e) {

            \DB::rollBack();   
            
            $result->error();
        }
        
        return $result;
    }
}