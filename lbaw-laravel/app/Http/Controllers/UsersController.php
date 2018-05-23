<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\User;
use Image;

class UsersController extends Controller
{
    public function profile($id){
        $user = User::find($id);
        $favorites = $user->favorites;

        return view('user.profile',compact('user','favorites'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        
        return redirect()->route('home');
   }

   public function update(Request $request,$id){
        $avatar = $request->file('avatar');
        $filename = time() . '.' . $avatar->getClientOriginalExtension();
        Image::make($avatar)->save( public_path('/images/avatars/' . $filename ) );


        $user = User::find($id);

        $user->username = request('username');
        $user->address = request('address');
        $user->city = request('city');
        $user->email = request('email');
        $user->zip = request('zip');
        $user->avatar = $filename;


        $user->save();

        return redirect()->route('profile',['id' => $user->id]);
    }

}
