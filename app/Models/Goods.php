<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

class Goods extends BaseModel
{
    protected $table = "goods";

    public static function getModelName() {
       return __('common.goods');        
   }

   public function getName() {
       return $this->name;
   }
}
