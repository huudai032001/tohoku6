<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_event extends Model
{
    protected $table = "category_event";

    public $timestamps = false;

    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    public function event()
    {
        return $this->belongsTo(\App\Models\Event::class, 'event_id');
    }

}
