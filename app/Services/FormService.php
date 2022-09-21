<?php 

namespace App\Services;

class FormService
{
    
    public function cleanText(Type $var = null)
    {
        //$this->value = trim($this->value);
        $this->value = strip_tags($this->value);
    }
}