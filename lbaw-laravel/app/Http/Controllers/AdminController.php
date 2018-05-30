<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
use Image;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function getAllUsers(){

        $users = User::where('permissions','User')->paginate(4);

        return view('admin.listUsers',compact('users'));

    }

    public function editProduct($id){

        $product = Product::find($id);

        return view('admin.editProduct',compact('product'));
    }

    public function searchUsers(Request $request){
        $text =$request->search_content;
        $users= DB::select("SELECT * from \"user\"  WHERE textsearch_name_col @@ to_tsquery('english',?)
          ORDER BY username DESC LIMIT 20",[$text]);
          return view('admin.listUsers',compact('users'));
    }

}
