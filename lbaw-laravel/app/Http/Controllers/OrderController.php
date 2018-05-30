<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Product;
use App\Order;


class OrderController extends Controller{

    public function create(Request $request){

        $order = new Order();

        $order->status = "Pending";
        $order->address = $request->input('address');
        $order->contact = $request->input('contact');
        $order->payment_method = $request->input('payment');
        $order->id_user = Auth::user()->id;
        $order->total_cost=5;
        $order->delivery_date =date('Y-m-d');
        $order->payment_date =date('Y-m-d');

        $cart = Auth::user()->cart;
        $order->save();

        foreach($cart as $product)
             $order->products()->attach($product->id);
        
        Auth::user()->cart()->detach();
 
        return $order;
      }
}