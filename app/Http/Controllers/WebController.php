<?php

namespace App\Http\Controllers;

use App\CategoryProduct;
use App\Comment;
use App\Mail\SendMail;
use App\Order;
use App\Post;
use App\CategoryPost;
use App\Product;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class WebController extends Controller
{

    public function index()
    {
        $category = CategoryProduct::all();
        $products = [];
        foreach ($category as $c ) {
            $products[] = Product::orderBy('updated_at','desc')->where('category_product_id',$c->id)->take(3)->get();
        }
        return view('mainpage.welcome',compact('category','products'));
    }

    public function aboutUs()
    {
        return view('mainpage.about');
    }

    public function contactUs()
    {
        return view('mainpage.contact');
    }

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

    public function shopping($id, Request $request)
    {
        $product = Product::find($id);
        //session(['key'=>'value']);// truyen mot gia tri vao session theo key
        /*
         * cart => array product (product->cart_qty= so luong mua)
         */
        $cart = $request->session()->get("cart");
        if ($cart == null) {
            $cart = [];
        }

        foreach ($cart as $p) {
            if ($p->id == $product->id) {
                $p->cart_qty = $p->cart_qty + 1;
                session(["cart"=>$cart]);
                return redirect()->to("cart");
            }
        }
        $product->cart_qty =1;
        $cart[]= $product;
        session(["cart"=>$cart]);
        return redirect()->to("cart");
    }

    public function cart(Request $request)
    {
        $cart=$request->session()->get("cart");
        if ($cart == null) {
            $cart = [];
        }
        $cart_total =0;
        foreach ($cart as $p){
            $cart_total +=($p->price*$p->cart_qty);
        }
        return view("mainpage.cart",["cart"=>$cart,"cart_total"=>$cart_total]);
    }
    public function clearOneCart($id,Request $request)
    {
        $cart=$request->session()->get("cart");
        foreach($cart as $key => $value){
            //dd($cart[$i]->id);
            if($value->id == $id){
                // dd($cart[$i]);
                unset($cart[$key]);
                //$request->session()->forget($id);
            }
        }
        $request->session()->put("cart",$cart);

        return redirect()->to("/cart");
    }

    public function checkout(Request $request)
    {
        if(!$request->session()->has("cart")){
            return redirect()->back();
        }


        $cart=$request->session()->get("cart");
        $cart_total =0;
        foreach ($cart as $p){
            $cart_total +=($p->price*$p->cart_qty);
        }
        return view('mainpage.checkout',["cart"=>$cart,"cart_total"=>$cart_total]);
    }
    public function placeOrder(Request $request){
        $request->validate([
            'customer_name'=>'required | string',
            'customer_address'=>'required',
            'customer_city'=>'required',
            'customer_country'=>'required',
            'customer_email'=>'required',
            'customer_phone'=>'required',
            'customer_postcode'=>'required',
            'method'=>'required',
        ]);
        $cart =$request->session()->get("cart");
        $grand_total=0;
        foreach ($cart as $p){
            $grand_total+=($p->price * $p->cart_qty);
        }
        $order =Order::create([
            'user_id'=>Auth::user()->id,
            'customer_name'=>$request->get("customer_name"),
            'customer_address'=>$request->get("customer_address"),
            'customer_city'=>$request->get("customer_city"),
            'customer_country'=>$request->get("customer_country"),
            'customer_email'=>$request->get("customer_email"),
            'customer_phone'=>$request->get("customer_phone"),
            'customer_postcode'=>$request->get("customer_postcode"),
            'total'=>$grand_total,
            'method'=>$request->get("method"),
            'status'=>Order::STATUS_PENDING
        ]);


        foreach ($cart as $p){
            DB::table("order_product")->insert([
                'order_id'=>$order->id,
                'product_id'=>$order->id,
                'quantity'=>$p->cart_qty,

            ]);
        }
        session()->forget('cart');
//        Mail::to(Auth::user())->send(new SendEmail($order));

        return redirect()->to("shopping-success");
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


    public function send()
    {
        Mail::to('sonthth1903012@fpt.edu.vn')->send(new SendMail());
        return back()->with('success', 'Thanks for contacting us!');
    }


}
