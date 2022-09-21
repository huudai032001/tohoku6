<?php
namespace App\Models\Traits;

trait HasDateTime {

    public function getDateTime($column, $format = null)
    {           
        if (empty($time = $this->$column)) {
            return;
        }
        if (!$format) $format = 'Y-m-d H:i:s';        
        return $time->format($format);
    }

    public function getDateTimeIso($column, $format = null)
    {           
        if (empty($time = $this->$column)) {
            return;
        }
        if (!$format) $format = 'YYYY-MM-DD HH:mm:ss';        
        return $time->isoFormat($format);
    }

}