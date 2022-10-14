<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;

class Spot extends BaseModel
{
     protected $table = "spots";

    protected $casts = [
        'images_id' => Casts\Json::class,
    ];   

     public static function getModelName() {
        return __('common.spot');        
    }

    public function getName() {
        return $this->name;
    }

    public function comments() {
        return $this->hasMany('App\Models\Comment', 'spot_id');
    }

    public function image()
    {
        return $this->belongsTo(\App\Models\Upload::class, 'image_id');
    }

    public function getImages()
    {
        return \App\Models\Upload::whereIn('id', $this->images_id)->get();
    }
   
    public function categories()
    {
        return $this->belongsToMany(\App\Models\SpotCategory::class, 'spot_term_map', 'object_id','term_id', );
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'author');
    }
   
    public function getStatus()
    {
        if ($this->status) {
            return __('status.' . $this->status);
        }
    }

    public function listLocation(){
        return [
            'Akita',
            'Aomori',
            'Fukushima',
            'Iwate',
            'Miyagi',
            'Yamagate',
        ];        
    }
}
