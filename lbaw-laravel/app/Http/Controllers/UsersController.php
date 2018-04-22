<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function profile($id){
       $user = User::find($id);
        return view('pages.user',compact('user'));
    }

    public function update($id){

        $user = User::find($id);;
        $user->username = "Alternativa";
        $user->save();
        
    }
}
