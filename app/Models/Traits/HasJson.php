<?php
namespace App\Models\Traits;

use Illuminate\Support\Arr;

trait HasJson {

    public function getJson($column, $key)
    {
        if (empty($data = $this->$column)) return;
        return Arr::get($data, $key);   
    }

    public function setJson($column, array $array)
    {
        $data = $this->$column ?: [];
        foreach($array as $key => $value) {
            Arr::set($data, $key, $value);
        }
        $this->$column = $data;
    }

    public function deleteJson($column, $key)
    {
        if (empty($data = $this->$column)) return;
        Arr::forget($data, $key);
        $this->$column = $data;
    }
}