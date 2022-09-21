<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits;
use App\Models\Casts;
use Illuminate\Database\Eloquent\SoftDeletes;

abstract class Content extends BaseModel
{  
    use Traits\HasDateTimeColumns;
    use Traits\HasFields; 
    use Traits\HasImages;
    use Traits\HasExcerpt;
    use SoftDeletes;    

    public function newerOne()
    {
        return static::where('id', '>', $this->id)->orderBy('id', 'asc')->first();
    }

    public function olderOne()
    {
        return static::where('id', '<', $this->id)->orderBy('id', 'desc')->first();
    }
   
    
}
