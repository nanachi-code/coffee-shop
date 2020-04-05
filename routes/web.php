<?php

use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

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
Route::get('/user/order',"WebController@userOrder");
//user end by Thai code
Auth::routes();


