<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function profile($user_id){
        return user_id;
    }

    public function destroy($user_id)
   {
       if($id != Auth::user()->id){
            Notification::container()->error('You are not allowed to delete that user. WTF.');
                        return Redirect::route('home');

       }
       if(User::find($user_id)){
           $user = User::find($id);
           $user->delete();
           Notification::container()->success('Your account has been permanently removed from the system. Sorry to see you go!');
           return Redirect::route('home');
       } else {

           return Redirect::route('home');
       }
   }

}
