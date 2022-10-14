<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits;
use App\Models\Casts;

use App\Misc\TaxonomyCollection;

abstract class Taxonomy extends BaseModel
{       
    public $timestamps = false;

    use Traits\Hierarchy;

    protected static $hierachy = false;
    
    abstract public function items();

    public function getName()
    {
        return $this->name;
    }

    public static function isHierachy()
    {
        return static::$hierachy;
    }

    public function newCollection(array $models = [])
    {
        return new TaxonomyCollection($models);
    }

    public function deleteAble()
    {
        return $this->items->isEmpty();
    }
}
