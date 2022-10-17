<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\HierachyTaxonomy;

use Illuminate\Database\Eloquent\Builder;

class EventCategory extends HierachyTaxonomy
{
    protected $table = "event_terms";

    public $timestamps = false;

    
    protected static function booted()
    {
        static::addGlobalScope('taxonomy', function (Builder $builder) {
            $builder->where('taxonomy', 'category');
        });
    }

    public function items()
    {
        return $this->belongsToMany(\App\Models\Event::class, 'event_term_map', 'term_id', 'object_id');
    }

}
