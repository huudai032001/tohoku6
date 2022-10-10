<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category_By_Posts extends Model
{
    protected $table = 'category_by_posts';

    public function getCategory()
    {
        return $this->belongsTo(\App\Models\Category::class, 'id_category');
      
    }
}
