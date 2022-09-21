<?php
namespace App\Models\Traits;

use App\Models\Upload;

trait HasImage
{
    public function image()
    {
        return $this->belongsTo(Upload::class, 'image_id');
    }    
}