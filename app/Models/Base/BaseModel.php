<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits;
use App\Models\Casts;

abstract class BaseModel extends Model
{           

    public static function getModelName() {
        return \Str::title(class_basename(static::class));
    }
    
    public function getName() {
        return static::getModelName() . ' ID ' . $this->id;
    }

    public function editAble()
    {
        return true;
    }

    public function deleteAble()
    {
        return true;
    }

    public function trashAble()
    {
        return $this->deleteAble();
    }

    public function restoreAble()
    {
        return $this->trashed();
    }

}
