<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function blogList()
    {
        $list = Post::all();
        return view('post-list',$list);
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
    //User start by Thai Code
    public function userProfile()
    {
        return view('user-profile');
    }
    public function userOrder()
    {
        return view('user-order');
    }
    //User end by Thai Code





}
