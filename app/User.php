<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Feeback;
use App\Cart;
use App\Wishlish;
use App\Review;
use App\Order;

class User extends Authenticatable
{
    use Notifiable;

    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email',
        'password',
        'name',
        'avatar',
        'phone',
        'birthday',
        'gender',

        'role',
        'provider',
         'provider_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = bcrypt($password);
    }
    public function wishlist()
    {
        return $this->hasMany(Wishlist::class, 'user_id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class, 'user_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id');
    }
    public function role($role)
    {
        if ($role == $this->role) return true;
        return false;
    }
}
