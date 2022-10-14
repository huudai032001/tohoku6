<?php
namespace App\Misc;

use Illuminate\Database\Eloquent\Collection;


class TaxonomyCollection extends Collection {

    public function getRightMostChildren()
    {
        $parent_ids = $this->pluck('parent_id');
        $parent_ids = $parent_ids->filter(function ($item)
        {
            return $item;
        });
        
        return $this->filter(function ($item) use ($parent_ids)
        {
            return !$parent_ids->contains($item->id);
        });
    }
}