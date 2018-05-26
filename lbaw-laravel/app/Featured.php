<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Featured extends Model
{
    protected $table = 'single_featured_product';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_product','id_featured_product'
    ];

    public function product(){

        return $this->belongsTo('App\Product', 'id_product');
    }

}