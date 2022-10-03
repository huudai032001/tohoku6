<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

class Spot extends BaseModel
{
     protected $table = "spots";

     public static function getModelName() {
        return __('common.spot');        
    }

    public function getName() {
        return $this->name;
    }

    public function comment() {
        return $this->hasMany('App\Models\Comment');
    }
}
