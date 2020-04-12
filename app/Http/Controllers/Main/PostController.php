<?php

namespace App\Http\Controllers\Main;
use App\CategoryProduct;
use App\Comment;
use App\Order;
use App\Post;
use App\CategoryPost;
use App\Product;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    public function blogList()
    {
        $list = Post::paginate(6);

        return view('mainpage.archive-post', compact('list'));
    }

    public function blogCateList($id)
    {
        $list = Post::orderBy('id', 'desc')->where('category_post_id', $id)->paginate(6);
        return view('mainpage.archive-post', compact('list'));
    }

    public function singlePost($id)
    {
        $post = Post::find($id);
        $category_post = CategoryPost::all();
        return view('mainpage.single-post', compact('post', 'category_post'));
    }

    public function commentStore(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            "comment" => "required"
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => false, "message" => $validator->errors()->first()]);
        }
        try {
            $comment = Comment::create([
                "content" => $request->get("comment"),
                "user_id" => Auth::user()->id,
                "post_id" => $id,
                "parent_id" => $request->get("parent_id"),
            ]);
            $post = Post::find($id);
            $post->comment_count = $post->comment_count + 1;
            $post->save();
        } catch (\Exception $e) {
            return $e;
        }
        return response()->json([
            'status' => true, 'message' => "Comment Success",
            "add_comment" => [
                "id" => $comment->id,
                "content" => $comment->content,
                "user_name" => $comment->User->name,
                "created_at" => $comment->created_at->toDateString(),
                "parent_id" => $comment->parent_id,
                "comment_count" => $post->comment_count,
            ]
        ], 200);
    }
}
