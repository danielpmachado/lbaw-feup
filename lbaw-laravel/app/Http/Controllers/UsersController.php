<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function profile($username){
       $user = User::whereUsername($username)->first();
       return view('pages.user');
    }

    public function destroy($user_id)
   {
       // if($user_id != Auth::user()->id){
       //      Notification::container()->error('You are not allowed to delete that user. WTF.');
       //                  return Redirect::route('home');
       //
       // }
       if(User::find($user_id)){
           $user = User::find($user_id);
           $user->delete();
           Notification::container()->success('Your account has been permanently removed from the system. Sorry to see you go!');
           return Redirect::route('/');
       } else {

           return Redirect::route('/');
       }
   }

}
