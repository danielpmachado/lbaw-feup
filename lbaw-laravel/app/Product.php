<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
use App\Brand;


class Product extends Model{
    protected $table = 'product';

    
    public $timestamps  = false;

    public function favorited(){
        $user = Auth::user();
        return (bool) $user->favorites()->where('id_user', $user->id)
                            ->where('id_product', $this->id)
                            ->first();
    }

    public function ordered(){
        $user = Auth::user();
        return (bool) $user->cart()->where('id_user', $user->id)
                            ->where('id_product', $this->id)
                            ->first();
    }

   /* public function brand(){

      /*$brands = Brand::all();
        $brand = Product::where($brands->id, 'id_brand');*/

        /*$brand = DB::table('brand')->join('product', 'brand.id','=', 'product.id_brand')->get();

        return $brand->name;

    }*/


}
