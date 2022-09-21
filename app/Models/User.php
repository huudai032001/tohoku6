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
    protected $fillable = [
        'name',
        'email',
        'password',
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
    ];    
    

    public static function getModelName()
    {
        return __('common.user');
    }

    public function getName()
    {        
        return $this->name ?: __('user.unnamed');
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

}
