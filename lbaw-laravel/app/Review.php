<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    public $timestamps = false; 

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'score', 'comment', 'date', 'id_product','id_user'
    ];

    public function product(){

      return $this->belongsTo('App\Product');
    }

    public function user(){

      return $this->belongsTo('App\User', 'id_user');
    }

}
