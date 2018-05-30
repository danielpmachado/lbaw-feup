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
    public function arrayPaginator($array, $request)
    {
    $page = Input::get('page', 1);
    $perPage = 10;
    $offset = ($page * $perPage) - $perPage;

    return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
        ['path' => $request->url(), 'query' => $request->query()]);
  }

    public function searchUsers(Request $request){
        $text =$request->search_content;
        $users = User::whereRaw('textsearch_name_col @@ to_tsquery(\'english\', ?)', $text)->paginate(4);
           return view('admin.listUsers',compact('users'));
    }
    public function addProduct(){
        $product = Product::find(1);
        return view('admin.addProduct',compact('product'));
    }


    public function insertProduct(Request $request){
        $product = new Product();
        $product->name = request('name');
        $product->price = request('price');
        $product->stock = request('stock');
        $product->description = request('description');
        $product->score=0;
        $product->id_brand=request('brand');
        $product->id_category=request('category');

        $avatar = $request->file('avatar');

        if($avatar != null){
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->save( public_path('/images/products/' . $filename ) );
            $product->pic = $filename;
        }

        $product->save();
        return redirect()->route('page',['id' => $product->id]);;
    }



}
