<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Featured;
use App\Category;

class CatalogController extends Controller
{
    public function getCatalog($type){

        $category = Category::where('name', $type)->get()->first();



        $products_paginate = Category::where('name', $type)->get()->first()->products()->paginate(5);


        return view ('catalog.page',compact('category','products_paginate'));
    }

}