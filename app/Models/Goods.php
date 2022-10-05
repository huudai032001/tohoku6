<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

class Goods extends BaseModel
{
    protected $table = "goods";
    protected $casts = [
        'images_id' => Casts\Json::class,
    ];  
    public static function getModelName() {
       return __('common.goods');        
   }

   public function getName() {
       return $this->name;
   }
   
   public function image()
   {
       return $this->belongsTo(\App\Models\Upload::class, 'image_id');
   }

   public function getImages()
   {
       return \App\Models\Upload::whereIn('id', $this->images_id)->get();
   }
}
