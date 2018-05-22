<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function page($id){
        $product = Product::find($id);
        return view('product.page',compact('product'));
    }
}
