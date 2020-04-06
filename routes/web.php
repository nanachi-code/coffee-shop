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

Route::get('/blog', 'WebController@blogList');
Route::get('/post/{id}', 'WebController@singlePost');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::get('/single-product', function () {
    return view('single-product');
});

Route::get('/shop', "WebController@shop");
Route::get('/cart', "WebController@cart");
Route::get('/checkout', "WebController@checkout");
Route::get('/menu', "WebController@menu");

//* Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', 'AdminController@renderDashboard');

    //* Post
    Route::prefix('post')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/post/all');
        });

        Route::get('/all', 'AdminController@renderArchivePost');

        Route::get('/new', 'AdminController@renderNewPost');

        Route::get('/{id}', 'AdminController@renderSinglePost');
    });

    //* Product
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/product/all');
        });

        Route::get('/all', 'AdminController@renderArchiveProduct');

        Route::get('/new', 'AdminController@renderNewProduct');

        Route::get('/{id}', 'AdminController@renderSingleProduct');
    });

    //* Category
    Route::prefix('category')->group(function () {
        Route::get('/', 'AdminController@renderArchiveCategory');

        Route::get('/{id}', 'AdminController@renderSingleCategory');

        Route::get('/{id}/delete', 'AdminController@deleteCategory');

        Route::post('/{id}/update', 'AdminController@updateCategory');

        Route::post('/new', 'AdminController@createCategory');
    });
});
