<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function profile($id){
        $user = User::find($id);
        return view('user.profile',compact('user'));
    }

    public function delete($id){
        $user = User::find($id);  
        $user->delete();
        return redirect()->route('home');
   }

   public function update($id){ 

        $this->validate(request(), [
            'username' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'city' => 'required|string|max:255',
        ]);

        $user = User::find($id);  

        $user->username = request('username');
        $user->address = request('address');
        $user->city = request('city');


        $user->save();

        return redirect()->route('profile',['id' => $user->id]);
    }

}
