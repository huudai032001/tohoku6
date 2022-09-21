<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

class Upload extends Model
{
    //use HasFactory;
    

    protected $table = 'uploads';

    use Traits\HasFields;
    
    protected $casts = [
        'fields' => Casts\Json::class,
    ];

    protected $with = ['folder'];

    public function folder()
    {
        return $this->belongsTo(UploadFolder::class, 'folder_id')->withDefault();
    }

    // return /uploads/dir/filename.ext
    public function getUrl()
    {           
        if ( $path = $this->getPath() ) {
            return Storage::disk('public')->url($path);
        }        
    }

    // if in root:  filename.ext
    // if in folders: dir1/dir2/filename.ext
    public function getPath() {
        if ( $this->folder_id && $folderPath = $this->folder->getPath() ) {
            return $folderPath . '/' . $this->file_name;
        } else {
            return $this->file_name;
        } 
    }


    public function getDisplayName($max = 100)
    {
        if (strlen($this->name) > $max) {
            return substr($this->name, 0, $max) . '...';
        }
        return $this->name; 
    } 

    public function getHumanSize()
    {   
        if ($this->size >= 104857600) {
            return round($this->size / 1048576, 0) .' MB';
        } elseif ($this->size >= 1048576) {
            return round($this->size / 1048576, 2) .' MB';
        } elseif ($this->size > 1024) {
            return round($this->size / 1024 , 0) .' KB';
        } else {
            return $this->size .' B';
        }
    }
    

    public function isImage()
    {
        return substr($this->mime_type, 0, 5) == 'image';
    }

    public function getCopy($size)
    {        
        $copy_info =  $this->getField('sizes.' . $size );
        if(empty($copy_info)) {
            return $this;
        }
        $copy = clone $this;
        $copy->file_name = $copy_info['file_name'];
        $copy->width = $copy_info['width'];
        $copy->height = $copy_info['height'];
        return $copy;
        // $copy = $this->getField('sizes.' . $size);
        // if($copy) {
        //     return (object) $copy;
        // }
    }
   
    public function getThumbnailImage()
    {
        
    }   

    public function getThumbnailImageUrl()
    {        
        return $this->getCopy('thumbnail')->getUrl() ?: '/admin-assets/admin-template/images/placeholders/placeholder.jpg';
    }

    public function getJSData()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'url' => $this->getUrl(),
            'thumbnail' => $this->getCopy('thumbnail')->getUrl(),
            'is_image' => $this->isImage(),
            'type' => $this->extension,
            'size' => $this->getHumanSize(),
            'fields' => $this->fields ?: [],
        ];
    }
}
