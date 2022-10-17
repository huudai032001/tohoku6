<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;

class Report extends BaseModel
{
    protected $table = "report";

    public static function getModelName() {
        return __('common.report');        
    }
    public function getName() {
        return $this->name;
    }

    public function comment(){
        return $this->belongsTo(\App\Models\Comment::class, 'object_id');
    }

    public function spot(){
        return $this->belongsTo(\App\Models\Spot::class, 'object_id');
    }

    public function userName(){
        return $this->belongsTo(\App\Models\User::class, 'user_id');
    }

    public static function reportList()
    {
        return [
           'unread' => __('status.unread'),
           'read' => __('status.read')
        ];
    }
}
