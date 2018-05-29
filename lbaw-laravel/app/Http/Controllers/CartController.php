<?php

namespace App\Http\Controllers;

use Auth;
use App\Product;


class CartController extends Controller{
    public function remove($id){
        $user = Auth::user();

        $product = $user->cart()->where('id_user', $user->id)
        ->where('id_product',$id)
        ->first();

        $quantity = $product->pivot->quantity;

        $user->cart()->detach($id);
  
        $product = Product::find($id);

        return response()->json([
            'product'=>$product, 
            'quantity'=>$quantity
            ]);
  
      }

    public function add($id){
        $user = Auth::user();
        $user->cart()->attach($id);

        $product = $user->cart()->where('id_user', $user->id)
        ->where('id_product',$id)
        ->first();

        $product->pivot->quantity=1;
        $product->pivot->save();

        $product = Product::find($id);
        return $product;

    }
  
    public function incQuantity($id){
        $user = Auth::user();

        $product = $user->cart()->where('id_user', $user->id)
                        ->where('id_product',$id)
                        ->first();

        $product->pivot->quantity++;
        $product->pivot->save();

        return response()->json([
            'product'=>$product, 
            'quantity'=>$product->pivot->quantity,
            'op'=>'add'
            ]);
    }

    public function subQuantity($id){
        $user = Auth::user();

        $product = $user->cart()->where('id_user', $user->id)
                        ->where('id_product',$id)
                        ->first();

        $op ='nan';
        if($product->pivot->quantity>1){
            $product->pivot->quantity--;
            $product->pivot->save();
            $op ='sub';
        }

        return response()->json([
        'product'=>$product, 
        'quantity'=>$product->pivot->quantity,
        'op'=>$op
        ]);
    }

}