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
}
