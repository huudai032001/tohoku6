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
    protected $fillable = ['id'];
    public function getName() {
        return $this->name;
    }
    public function upload() {
        return $this->belongsTo('App\Models\Upload');
    }
    public function comment() {
        return $this->hasMany('App\Models\Comment');
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
        return \App\Models\Category_spot::where('spot_id', $this->id)->get();
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'author');
    }
    public static function statusList()
    {
        return [
           'active' => __('status.active'),
           'disabled' => __('status.disabled')
        ];
    }
    public function statusName()
    {
        if ($this->status) {
            return __('status.' . $this->status);
        }
    }

    public function categoryDetail()
    {
        return $this->hasMany(\App\Models\Category_spot::class);
    }

}
