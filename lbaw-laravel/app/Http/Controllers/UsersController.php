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
}
