<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;

class Comment extends BaseModel
{
    protected $table = 'comment';

    // public function spot() {
    //     return $this->hasMany('App\Models\Spot');
    // }
    public static function getModelName() {
        return __('common.comment');        
    }
    public function getName() {
        return $this->name;
    }
    public function spot() {
        return $this->belongsTo('App\Models\Spot');
    }

    public function spots()
    {
        return $this->belongsTo(\App\Models\Spot::class, 'spot_id');
    }
    public function userName()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public function spotName()
    {
        return $this->belongsTo(\App\Models\Spot::class, 'spot_id');
    }
}
