<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

class Task extends BaseModel
{
     protected $table = "tasks";

     public static function getModelName() {
        return __('common.spot');        
    }

    public function getName() {
        return $this->name;
    }

}
