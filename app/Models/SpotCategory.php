<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\HierachyTaxonomy;

use Illuminate\Database\Eloquent\Builder;

class SpotCategory extends HierachyTaxonomy
{
    protected $table = "spot_terms";

    public $timestamps = false;

    
    protected static function booted()
    {
        static::addGlobalScope('taxonomy', function (Builder $builder) {
            $builder->where('taxonomy', 'category');
        });
    }

    public function items()
    {
        return $this->belongsToMany(\App\Models\Spot::class, 'spot_term_map', 'term_id', 'object_id');
    }

}
