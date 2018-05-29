<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Review;
use Auth;

class ReviewController extends Controller
{

    public function create(Request $request, $id_product){

      $review = new Review();
      $review->score = $request->input('rate');
      $review->comment = $request->input('comment');
      $review->id_user = Auth::user()->id;
      $review->date= date('Y-m-d');
      $review->id_product = $id_product;
      $review->save();

      return response()->json([
        'review'=>$review,
        'user'=>Auth::user()
        ]);

    }


    public function delete( $id_review){
        $review = Review::find($id_review);
        $review->delete();

        return $id_review;
    }
}
