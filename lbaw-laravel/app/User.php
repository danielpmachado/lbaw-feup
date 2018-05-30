<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'user';

    // Don't add create and update timestamps in database.
    public $timestamps  = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'address','city','zip','permissions', 'provider', 'provider_id'
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
     * Get all of favorite posts for the user.
     */
    public function favorites()
    {
        return $this->belongsToMany(Product::class, 'favorite', 'id_user', 'id_product');
    }

    /**
     * Get all of the products of the cart
     */
    public function cart()
    {
        return $this->belongsToMany(Product::class, 'cart', 'id_user','id_product')->withPivot('quantity');
    }

    public function orders(){
        return $this->hasMany(Order::class,'id_user');
    }


}
