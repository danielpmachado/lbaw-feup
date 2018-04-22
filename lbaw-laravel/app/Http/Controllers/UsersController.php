<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller
{
    public function profile($user_id){
       $user = User::whereUsername($user_id)->first();
       return $user;
    }
}
