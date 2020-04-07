<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function renderArchivePost()
    {
        $p = [
            'posts' => Post::all()
        ];

        return view('archive-post')->with($p);
    }
}
