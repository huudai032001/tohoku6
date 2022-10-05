<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;

use Illuminate\Contracts\Auth\MustVerifyEmail as MustVerifyEmailContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use App\Models\Base\BaseModel;

use App\Models\Traits;
use App\Models\Casts;

class User extends BaseModel implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword, MustVerifyEmail;

    use HasApiTokens, HasFactory, Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
        'facebook_id',
        'google_id'
];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'image_id'=> Casts\Json::class,

    ];    
    

    public static function getModelName()
    {
        return __('common.user');
    }

    public function getName()
    {
        if ($this->sei && $this->mei) {
            return $this->sei . ' ' . $this->mei;
        }     
    }

    public function getNameKana()
    {
        if ($this->sei_kana && $this->mei_kana) {
            return $this->sei_kana . ' ' . $this->mei_kana;
        }    
    }
    
    public static function roleList()
    {
        return [
           'admin' => __('user.role_name.admin'),
           'member' => __('user.role_name.member')
        ];
    }

    public function roleName()
    {
        if ($this->role) {
            return __('user.role_name.' . $this->role);
        }
    }

    public static function statusList()
    {
        return [
           'active' => __('status.active'),
           'disabled' => __('status.disabled')
        ];
    }

    public function statusName()
    {
        if ($this->status) {
            return __('status.' . $this->status);
        }
    }

    public function image()
    {
        return $this->belongsTo(\App\Models\Upload::class, 'avatar_image_id');
    }

    public function getImages()
    {
        return \App\Models\Upload::whereIn('id', $this->avatar_image_id)->get();
    }
}
