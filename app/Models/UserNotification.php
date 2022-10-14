<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Base\BaseModel;
use Illuminate\Database\Eloquent\Builder;

use App\Models\Traits;
use App\Models\Casts;

class UserNotification extends BaseModel
{
    protected $table = 'user_notifications';

    protected $casts = [
        'params' => Casts\Json::class,
    ];

    public static function getModelName()
    {
        return __('user.notification');
    }

    public function getMessage()
    {
        $func = 'message'. \Str::studly($this->string);
        if (method_exists($this, $func)) {
            return $this->$func();
        } else {
            return __('notification.' . $this->string, $this->params);
        }        
    }
   
    public function messageNewOrderReceived()
    {
        $oder_id = $this->params['order_id'];
        $order = Order::find($oder_id);
        return __('notification.' . $this->string, [
            'link' => route('admin.order.item-action', [
                'id' => $oder_id, 
                'action' => 'view'
            ]),
            'order_id' => $oder_id
        ]);
    }
}