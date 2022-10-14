<?php

namespace App\Models\Sample;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Base\Content;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Traits;
use App\Models\Casts;

class SampleContent extends Content
{
    protected $casts = [
        // 'datetime' => 'datetime',
        // 'fields' => Casts\Json::class,
    ]; 
   
}