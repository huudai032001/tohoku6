<?php

namespace App\Models\Sample;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Traits;
use App\Models\Casts;

class SampleModel extends BaseModel
{
    // protected $table = '';

    // public $timestamps = false;

    protected $casts = [
        //'fields' => Casts\Json::class,
    ];

    // public static function getModelName()
    // {
    //     return __('common.name');
    // }

    // public function getName() {
    //     return $this->name;
    // }
}