<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits;
use App\Models\Casts;

abstract class Taxonomy extends BaseModel
{       
    public $timestamps = false;
    
    abstract public function items()
    {
        
    }
}
