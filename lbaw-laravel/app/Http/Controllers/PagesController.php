<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Featured;

class PagesController extends Controller
{
    public function index(){

        $featuredProducts = Featured::all();

        return view('pages.index', compact('featuredProducts'));
    }

    public function about(){
        return view('pages.about');
    }

    public function faq(){
        return view('pages.faq');
    }
    public function error404(){
        return view('pages.404');
    }
}
