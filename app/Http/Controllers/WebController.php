<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Comment;
use App\Post;
use App\CategoryPost;
use App\Product;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{

    public function index()
    {
        return view('mainpage.welcome');
    }

    public function aboutUs()
    {
        return view('mainpage.about');
    }

    public function contactUs()
    {
        return view('mainpage.contact');
    }

    // blog
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

    // end blog
    public function categoryAll()
    {
        $category = CategoryProduct::all();
        $product = Product::paginate(9);
        return view('mainpage.shop', compact('category', 'product'));
    }

    public function categoryOne($id)
    {
        $category = CategoryProduct::find($id);
        $product = Product::where("category_product_id", $id)->paginate(9);
        return view('mainpage.shop', compact('category', 'product'));
    }

    public function categoryProduct($id)
    {
        $product = Product::find($id);
        $where = [
            ['category_product_id', $product->category_product_id],
            ['id', '!=', $product->id]
        ];
        $related_product = Product::orderBy('id', 'desc')
            ->where($where)
            ->take(4)
            ->get();
        return view('mainpage.single-product', compact('product', 'related_product'));
    }

    public function cart()
    {
        return view('mainpage.cart');
    }

    public function checkout()
    {
        return view('mainpage.checkout');
    }

    public function menu()
    {
        return view('mainpage.menu');
    }
    //User start by Thai Code
    public function userProfile()
    {
        $user = Auth::user();
        return view('mainpage.user-profile', ['user' => $user]);
    }
    public function userProfileUpdate($id, Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255']
        ]);

        $user = User::find($id);
        $user->name = $request->get('name');
        $user->phone = $request->get('phone');
        $user->dateOfBirth = $request->get('dateOfBirth');
        $user->address = $request->get('address');

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            Storage::disk('public')->put($avatar->getClientOriginalName(),  File::get($avatar));
            $user->avatar = $avatar->getClientOriginalName();
        }

        try {
            $user->save();
        } catch (\Exception $e) {
            throw $e;
        }
        return redirect()->to("user/profile");
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => ['required'],
            'new_password' => ['required'],
            'confirm_password' => ['same:new_password'],
        ]);
        if ($validator->fails()) {
            return response()->json(["status" => false, "messenger" => $validator->errors()->first()]);
        }
        if (!Hash::check($request->get('old_password'), Auth::user()->password)) {
            return  response()->json(['status' => false, "messenger" => "Old Password False"]);
        };
        $new_password = $request->get("new_password");
        $user = Auth::user();
        $user->update([
            "password" => Hash::make($new_password),
        ]);

        return response()->json(['status' => true, "messenger" => "Change Password Successfully"]);
    }

    public function userOrder()
    {
        return view('mainpage.user-order');
    }
    public function userOrderDetail()
    {
        return view('mainpage.user-order-detail');
    }

    //User end by Thai Code


}
