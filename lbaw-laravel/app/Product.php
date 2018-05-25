<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;

class Product extends Model{
    protected $table = 'product';

    public function favorited(){
        $user = Auth::user();
        return (bool) $user->favorites()->where('id_user', $user->id)
                            ->where('id_product', $this->id)
                            ->first();
    }
    

}

