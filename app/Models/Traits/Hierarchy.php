<?php
namespace App\Models\Traits;

trait Hierarchy {
    
    public function parent()
    {
        return $this->belongsTo(static::class, 'parent_id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(static::class, 'parent_id');
    }

    public function sibling()
    {
        return $this->parent->children()->where('id', '!=', $this->id);
    }

}