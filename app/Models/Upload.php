<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;

class Upload extends BaseModel
{
    //use HasFactory;
    
    use Traits\HasDateTime;
    use Traits\HasJson; 
    use Traits\HasImage;
    use Traits\HasExcerpt;


    protected $table = 'uploads';
    
    protected $casts = [
        'file_info' => Casts\Json::class,
    ];

    
    public function getUrl($version = '')
    {
        return Storage::disk('public')->url($this->getPath($version));   
    }

    public function getPath($version = '')
    {
        if ($version && ($version_file_name =  $this->getJson('file_info', 'versions.' . $version . '.file_name' ))) {
            $file_name = $version_file_name;
        } else {
            $file_name = $this->file_name;
        }
        if ( $this->folder_path) {
            return $this->folder_path . '/' . $file_name;
        } else {
            return $file_name;
        }   
    }


    public function getName()
    {
        // if (strlen($this->name) > $max) {
        //     return substr($this->name, 0, $max) . '...';
        // }
        return $this->name; 
    } 

    public function getHumanSize()
    {   
        if ($this->file_size >= 104857600) {
            return round($this->file_size / 1048576, 0) .'MB';
        } elseif ($this->file_size >= 1048576) {
            return round($this->file_size / 1048576, 2) .'MB';
        } elseif ($this->file_size > 1024) {
            return round($this->file_size / 1024 , 0) .'KB';
        } else {
            return $this->file_size .'B';
        }
    }
    

    public function isImage()
    {
        return substr($this->mime_type, 0, 5) == 'image';
    }

   
    // public function getThumbnailImage()
    // {
        
    // }   

    // public function getThumbnailImageUrl()
    // {        
    //     return $this->getUrl('thumbnail') ?: '/core-assets/global_assets/images/placeholders/placeholder.jpg';
    // }

    public function getJsData()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->getUrl(),
            'thumbnail' => $this->getUrl('thumbnail'),
            'is_image' => $this->isImage(),
            'extension' => $this->extension,
            'file_size' => $this->getHumanSize(),
            'versions' => $this->getJson('file_info', 'versions') ?: [],
        ];
    }
}
