<?php
namespace App\Models\Traits;

trait HasExcerpt {
    
    public function getExcerpt($length = null, $trail = '...')
    {   
        if (!$length) $length = 100;
        $text = $this->excerpt ?: $this->content;

        $text = strip_tags($text);
        
        if (mb_strlen($text) > $length) {
            $text = mb_substr($text, 0,  $length) . $trail;
        }
        
        return $text;
    }

}