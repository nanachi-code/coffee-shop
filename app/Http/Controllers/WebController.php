<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use App\PostCategory;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{

// blog
    public function blogList()
    {
        $list = Post::paginate(3);

        return view('post-list',['list' => $list]);
    }

    public function singlePost($id)
    {
        $post = Post::find($id);
        $post_cate = PostCategory::all();
        $comment = $post->Comments;
        $author = $post->User;
        return view('single-post',compact('post','post_cate','comment','author'));
    }

    public function commentStore(Request $request,$id)
    {

        $validator = Validator::make($request->all(),[
            "comment" => "required"
        ]);
        if($validator->fails()){
            return response()->json(["status"=>false,"message"=>$validator->errors()->first()]);
        }
        try {
            $comment = Comment::create([
                "content"=> $request->get("comment"),
                "user_id"=> Auth::user()->id,
                "post_id"=> $id,
                "parent"=> $request->get("parent_id"),
            ]);
        }catch (\Exception $e){
            return $e;
        }
        return response()->json(['status'=>true,'message'=>"Comment Success",
            "add_comment" => [
                "content" => $comment->content,
                "user_name"=> $comment->User->name,
                "created_at"=> $comment->created_at->toDateString(),
                "parent"=> $comment->parent,
            ]
            ],200);
    }
// end blog
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

    public function changePassword(Request $request){
        $validator =Validator::make($request->all(),[
            'old_password'=>['required'],
            'new_password'=>['required'],
            'confirm_password'=>['same:new_password'],
        ]);
        if($validator ->fails()){
            return response()->json(["status"=>false,"messenger"=>$validator->errors()->first()]);
        }
        if(!Hash::check($request->get('old_password'),Auth::user()->password)){
            return  response()->json(['status'=>false,"messenger"=>"Old Password False"]);
        };
        $new_password = $request->get("new_password");
        $user= Auth::user();
        $user->update([
            "password"=>Hash::make($new_password),
        ]);

        return response()->json(['status'=>true,"messenger"=>"Change Password Successfully"]);
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
