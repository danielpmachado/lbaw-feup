<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    public $timestamps = false; 

    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'status','address', 'contact', 'total_cost', 'payment_method', 'id_user', 'delivery_date', 'payment_date'
    ];


    /**
     * Get all the products 
     */
    public function products() { 
        return $this->belongsToMany(Product::class, 'product_order', 'id_order', 'id_product');
    }


}
