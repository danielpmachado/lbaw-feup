<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\Order;
use Image;


class UsersController extends Controller
{
    public function profile($id){
        $user = User::find($id);
        $favorites = $user->favorites;

        $orders = $user->orders;

        return view('user.profile',compact('user','favorites','orders'));
    }

    public function delete($id){
        $user = User::find($id);
        $user->delete();
        $users = User::where('permissions','User')->paginate(4);

      return view ('admin.listUsers',compact('users'));
   }

   public function update(Request $request,$id){
        $user = User::find($id);

        $user->username = request('username');
        $user->address = request('address');
        $user->city = request('city');
        $user->email = request('email');
        $user->zip = request('zip');

        $avatar = $request->file('avatar');

        if($avatar != null){
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/images/avatars/' . $filename ) );
            $user->avatar = $filename;
        }

        $user->save();

        return redirect()->route('profile',['id' => $user->id]);
    }

    public function cart($id){
      $user = User::find($id);
      $products= $user->cart;

      if(Auth::user()->id == $id)
        return view('cart.order',compact('products','user'));
      else
         return redirect('/');

    }

    public function block($id){
        $user = User::find($id);
        $user->blocked=1;

        $users = User::where('permissions','User')->paginate(4);

      return view ('admin.listUsers',compact('users'));
    }


}
