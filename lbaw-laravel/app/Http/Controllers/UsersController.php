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
             'username' => 'required',
        ]);

        $user = User::find($id);  

        $user->username = request('username');
        $user->address = request('address');
        $user->city = request('city');
        $user->password = bcrypt(request('password'));


        $user->save();

        return redirect()->route('home');
    }

}
