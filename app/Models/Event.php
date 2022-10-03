<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;
use Eloquent;
class Event extends BaseModel
{
    protected $table = "event";

    public static function getModelName() {
        return __('common.event');        
    }

    public function getName() {
        return $this->name;
    }

    public function upload() {
        return $this->belongsTo('App\Models\Upload');
    }

    public function joinUpload()
    {
        return $this->hasMany('App\Models\Upload');
    }
}
