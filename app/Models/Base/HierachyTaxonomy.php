<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits;
use App\Models\Casts;

abstract class HierachyTaxonomy extends Taxonomy
{    
    protected static $hierachy = true;
    
    use Traits\Hierarchy;

    public function getSyncId($ids)
    {
        $ids = \Arr::wrap($ids);
        $result = collect();
        foreach($ids as $id) {
            $model = static::find($id);
            if ($model) {                
                if (!$result->contains($model->id)) {
                    $result->push($model->id);;
                }
                while($model->parent_id && ($parent = $model->parent)) {                    
                    if (!$result->contains($parent->id)) {
                        $result->push($parent->id);                        
                    }
                    $model = $parent;
                }
            }            
        }
        return $result->sort()->toArray();
    }

    public function deleteAble()
    {        
        return !($this->items()->exists() || $this->children()->exists());
    }
}
