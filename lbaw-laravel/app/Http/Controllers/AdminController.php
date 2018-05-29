<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Image;

class AdminController extends Controller
{
    public function getAllUsers(){
        
        $users = User::where('permissions','User')->get();

        return view('admin.listUsers',compact('users'));

    }

    public function editProduct($id){

        $product = Product::find($id);

        return view('admin.editProduct',compact('product'));
    }

}