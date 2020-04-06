<?php

namespace App\Http\Controllers;

use App\Post;
use App\PostCategory;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class WebController extends Controller
{


    public function blogList()
    {
        $list = Post::paginate(3);

        return view('post-list',['list' => $list]);
    }

    public function singlePost($id)
    {
        $post = Post::find($id);
        $post_cate = PostCategory::all();
        return view('single-post',['post' => $post, 'post_cate' => $post_cate]);
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
        $user = Auth::user();
        return view('user-profile',['user'=>$user]);
    }
    public function userProfileUpdate($id,Request $request){
        $user = User::find($id);
        $request->validate([ // truyen vao rules de validate
            "email"=> "required|string|max:191|unique:users,email,".$id,// validation laravel
            "name"=> "required|string",
            "dateOfBirth"=> "required|date",
            "phone"=> "required|string|max:191|unique:users,phone,".$id,
            "address"=> "required|string",
        ]);
        try {
            $user->update([
                "name"=> $request->get("name"),
                "email"=> $request->get("email"),
                "dateOfBirth"=> $request->get("dateOfBirth"),
                "phone"=> $request->get("phone"),
                "address"=> $request->get("address"),
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("user/profile");
    }

    public function userOrder()
    {
        return view('user-order');
    }
    public function userOrderDetail()
    {
        return view('user-order-detail');
    }
    //User end by Thai Code
}
