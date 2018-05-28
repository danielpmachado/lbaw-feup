<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model{
    protected $table = 'product_category';

    /**
     * Get all of products for a category
     */
    public function products(){
        return $this->belongsToMany(Product::class, 'single_category', 'id_product_category','id_product');
    }

}
