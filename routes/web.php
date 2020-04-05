<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about-us', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/blog','WebController@blogList');
Route::get('/post/{id}','WebController@singlePost');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/shop',"WebController@shop");
Route::get('/cart',"WebController@cart");
Route::get('/checkout',"WebController@checkout");
Route::get('/menu',"WebController@menu");

//user start by Thai code
Route::get('/user/profile',"WebController@userProfile");

Route::post('user/profile/update/{id}',"WebController@userProfileUpdate");

Route::get('/user/order',"WebController@userOrder");
Route::get('/user/order/{id}',"WebController@userOrderDetail");
//user end by Thai code
Auth::routes();


Route::get('/input-blog', function () {
    return view('blogpost');
});

Route::post('/post-store', function (Request $request) {

    $content = $request->content;
    try {
        $image = null;
        $ext_allow = ["png", 'jpg', 'jpeg', 'gif'];
        if ($request->hasFile("image")) {
            $file = $request->file("image");
            $file_name = time() . '-' . $file->getClientOriginalName();
            $ext = $file->getClientOriginalExtension();
            if (in_array($ext, $ext_allow)) {
                $file->move("images", $file_name);
                $image = "images/" . $file_name;
            }
        }
        \App\Post::create([
            "title" => $request->get("title"),
            'thumbnail' => $image,
            'content' => $content,
            'user_id' => $request->user_id,
            'post_category_id' => $request->post_category_id
        ]);
    } catch (Exception $e) {
        //dd($e);
        dd($e);
        return redirect()->back();
    }
    return redirect()->to("/blog");
});
