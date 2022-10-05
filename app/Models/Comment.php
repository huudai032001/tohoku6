<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';

    // public function spot() {
    //     return $this->hasMany('App\Models\Spot');
    // }
    public function spot() {
        return $this->belongsTo('App\Models\Spot');
    }

    public function spots()
    {
        return $this->belongsTo(\App\Models\Spot::class, 'spot_id');
    }
}
