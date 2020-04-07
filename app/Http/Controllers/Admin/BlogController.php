<?php

namespace App\Http\Controllers\Admin;

use App\CategoryPost;
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

        return view('admin/archive-post')->with($p);
    }

    public function renderSinglePost($id)
    {
        $p = [
            'post' => Post::where('id', $id)->first(),
            'allCategories' => CategoryPost::all()
        ];

        return view('admin/single-post')->with($p);
    }
}
