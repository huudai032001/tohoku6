<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;
class ExchangeGoods extends BaseModel
{
    protected $table = 'exchange_goods';

    public static function getModelName() {
        return __('common.exchange_goods');        
    }

    public function getName() {
        return $this->name;
    }
    public function exchangeList(){
        return [
           'unread' => __('common.unread'),
           'read' => __('common.read')
        ];
    }
}
