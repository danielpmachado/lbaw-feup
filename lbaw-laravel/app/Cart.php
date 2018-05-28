<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table = 'order';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status','address', 'contact', 'total_cost', 'payment_method', 'id_user', 'delivery_date', 'payment_date'
    ];


    /**
     * Get all the items in the cart
     */
    public function items() {
        return $this->belongsToMany(Product::class, 'product_order', 'id_order', 'id_product');
    }



}
