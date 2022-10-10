<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;
use Eloquent;
use App\Models\Traits;
use App\Models\Casts;
class Event extends BaseModel
{
    protected $table = "event";
    protected $casts = [
        'images_id' => Casts\Json::class,
    ];   
    public static function getModelName() {
        return __('common.event');        
    }

    public function getName() {
        return $this->name;
    }

    public function upload() {
        return $this->belongsTo('App\Models\Upload');
    }

    public function joinUpload()
    {
        return $this->hasMany('App\Models\Upload');
    }

    public function image()
    {
        return $this->belongsTo(\App\Models\Upload::class, 'image_id');
    }

    public function getImages()
    {
        return \App\Models\Upload::whereIn('id', $this->images_id)->get();
    }
    public function getCategory()
    {
        return \App\Models\Category::whereIn('id', explode(",",$this->category))->get();
    }

    public function categorys(){
        return \App\Models\Category_By_Posts::where('id_posts', $this->id)->get();
    }
}
