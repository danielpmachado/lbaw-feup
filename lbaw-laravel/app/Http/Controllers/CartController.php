<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use App\User;
use App\Product;
use App\Cart;

class CartController extends Controller
{
    public function page($id){
        
        $user = User::find($id);

        $carts = Cart::where('id_user',$id)->get();

        $products = array();

        foreach($carts as $cart){

            $products[] = $cart->item;
        }

        return view('cart.page',compact('user', 'products'));
    }

}