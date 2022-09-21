<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

class Event extends BaseModel
{
    protected $table = "event";

    public static function getModelName() {
       return __('common.event');        
   }

   public function getName() {
       return $this->name;
   }
}
