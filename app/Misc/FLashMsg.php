<?php
namespace App\Misc;

class FlashMsg
{       

    protected static $groups = [];

    public static function addMsg($type = 'notice', $msg)
    {
        static::$groups[] = [
            'type' => $type,
            'content' => $msg
        ];
        
        session()->flash('flash-msg', static::$groups);
    }

    public static function addNotice($msg)
    {
        static::addMsg('notice', $msg);
    }

    public static function addSuccess($msg)
    {
        static::addMsg('success', $msg);
    }

    public static function addWarning($msg)
    {
        static::addMsg('warning', $msg);
    }
    
    public static function addError($msg)
    {
        static::addMsg('error', $msg);
    }

}