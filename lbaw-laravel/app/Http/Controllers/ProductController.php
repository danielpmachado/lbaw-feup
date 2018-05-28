<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Review;

class ProductController extends Controller
{
    public function page($id){
        $product = Product::find($id);

        $reviews = Review::where('id_product',$id)
        ->orderBy('date','desc')
        ->get();

        return view('product.page',compact('product','reviews'));
    }


    public function favorite($id){
        Auth::user()->favorites()->attach($id);

        $product = Product::find($id);
        return $product;
    }

    public function unfavorite($id){
        Auth::user()->favorites()->detach($id);

        $product = Product::find($id);
        return $product;
    }

    public function searchByName($searchText){
        return DB::select("SELECT * from product WHERE textsearchable_name_col @@ plainto_tsquery('english',?) ORDER BY name DESC LIMIT 20",[$searchText]);
    }
}
