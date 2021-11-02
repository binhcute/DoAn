<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable,HasApiTokens;

    protected $table = 'users';
    //Khóa chính tự động tăng int
    protected $primaryKey = 'id';

    //Kết nối CSDL
    protected $connection = 'mysql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'username',
        'avatar',
        'gender',
        'phone',
        'address',
        'email',
        'password',
        'level',
        'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function product()
    {
        return $this->HasMany('App\Models\Product', 'user_id', 'id');
    }
    public function category()
    {
        return $this->HasMany('App\Models\Category', 'user_id', 'id');
    }
    public function porfolio()
    {
        return $this->HasMany('App\Models\Portfolio', 'user_id', 'id');
    }
    public function article()
    {
        return $this->HasMany('App\Models\Article', 'user_id', 'id');
    }
    public function order()
    {
        return $this->HasMany('App\Models\Order', 'user_id', 'id');
    }
    // public function AauthAcessToken()
    // {
    //     return $this->hasMany('App\Models\OauthAccessToken');
    // }
}

