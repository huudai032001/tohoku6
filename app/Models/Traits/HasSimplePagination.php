<?php
namespace App\Models\Traits;

trait HasSimplePagination {

    public function getNewerOne()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function getOlderOne()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
    
}
