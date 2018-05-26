<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
use App\Review;
use Auth;

class ReviewController extends Controller
{

    public function create(Request $request, $id_product)
    {
      
      $review = new Review();
      $review->comment = $request->input('comment');
      $review->id_user = Auth::user()->id;
      $review->id_product = $id_product;
      $review->save();
      return $review;
      // $comment->id_product = $auction_id;
      // $review->comment = $request->input('comment');
      // $review->score = $request->input('score');
      // $review->id_user = Auth::user()->user_id;
      // $review->date= date('Y-m-d H:i:s');
      // $review->save();
      // $review->load('user');
      // if(preg_match('/https:\//',Auth::user()->avatar, $matches, PREG_OFFSET_CAPTURE))
      //   $review->url= $review->user->photo;
      // else
      //   $review->url= '/images/'.($review->user->photo=='perfil_blue.png'?'commentImage.jpg' : $review->user->photo);
      // return $review;
    }
}
