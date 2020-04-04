<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebController extends Controller
{
    public function blogList()
    {
        return view('post-list');
    }

    public function singlePost($id)
    {
        return view('single-post');
    }

    public function shop()
    {
        return view('shop');
    }

    public function cart()
    {
        return view('cart');
    }

    public function checkout()
    {
        return view('checkout');
    }

    public function menu()
    {
        return view('menu');
    }


}
