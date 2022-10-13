<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;
class Report_spot extends BaseModel
{
    protected $table = "report_spot";
    public static function getModelName() {
        return __('common.report_spot');        
    }
    public function getName() {
        return $this->name;
    }
    public function spot(){
        return $this->belongsTo(\App\Models\Spot::class, 'spot_id');
    }
    public function userName(){
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }
}
