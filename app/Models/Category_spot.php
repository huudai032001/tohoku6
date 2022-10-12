<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_spot extends Model
{
    protected $table = "category_spot";

    public $timestamps = false;

    // public function belongsTo()
    // {
    //     return $this->belongsTo(\App\Models\Spot::class);
    // }
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }
}
