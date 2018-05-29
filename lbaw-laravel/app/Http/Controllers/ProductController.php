<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Product;
use App\Review;
use Illuminate\Support\Facades\DB;

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

    public function searchProducts(Request $request){

      $text =$request->search_content;
      $products=$this->searchByName($text);
      return view('pages.search_page',compact('products'));

    }

    public function searchByName($searchText){
       return DB::select("SELECT * from product
        WHERE textsearchable_name_col @@ to_tsquery('portuguese',?)
        ORDER BY name DESC LIMIT 20",[$searchText]);
    }

    public function deleteOrder($id){
      Auth::user()->cart()->detach($id);

      $product = Product::find($id);
      return $product;

    }

    public function addQuantity($id){
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

    public function delete($id){
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('home');
   }
}
