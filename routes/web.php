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

Route::get('/', 'WebController@index');

Route::get('/about-us', 'WebController@aboutUs');

Route::get('/contact', 'WebController@contactUs');

// main page blog part
Route::prefix('/blog')->group(function ()
{
    Route::get('/', 'WebController@blogList');

    Route::get('/{id}', 'WebController@blogCateList');

    Route::get('/post/{id}', 'WebController@singlePost');

    Route::post('/post-comment-{id}', 'WebController@commentStore');

});

// end blog
Auth::routes();
Route::prefix('/category')->group(function ()
{
    Route::get('/product/{id}','WebController@categoryProduct');

    Route::get('/all', "WebController@categoryAll");

    Route::get('/{id}','WebController@categoryOne');
});

Route::get('/cart', "WebController@cart");
Route::get('/checkout', "WebController@checkout");
Route::get('/menu', "WebController@menu");

//user start by Thai code
Route::get('/user/profile',"WebController@userProfile")->middleware("auth");

Route::post('user/profile/update/{id}',"WebController@userProfileUpdate")->middleware("auth");
Route::post("changePassword","WebController@changePassword")->middleware("auth");


Route::get('/user/order',"WebController@userOrder")->middleware("auth");
Route::get('/user/order/{id}',"WebController@userOrderDetail")->middleware("auth");
//user end by Thai code
Auth::routes();

Route::get('logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/login');

});

//* Admin routes
Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return redirect('/admin/dashboard');
    });

    Route::get('/dashboard', 'Admin\DashboardController@renderDashboard');

    //* Post
    Route::prefix('post')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/post/all');
        });

        Route::get('/all', 'Admin\PostController@renderArchivePost');

        Route::get('/new', 'Admin\PostController@renderNewPost');

        Route::post('/new', 'Admin\PostController@createPost');

        Route::get('/{id}', 'Admin\PostController@renderSinglePost');

        Route::post('/{id}/update', 'Admin\PostController@updatePost');

        Route::get('/{id}/delete', 'Admin\PostController@deletePost');

        Route::get('/{id}/restore', 'Admin\PostController@restorePost');
    });

    //* Category Post
    Route::prefix('category-post')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/category-post/all');
        });

        Route::get('/all', 'Admin\CategoryPostController@renderArchiveCategory');

        Route::post('/new', 'Admin\CategoryPostController@createCategory');

        Route::get('/{id}', 'Admin\CategoryPostController@renderSingleCategory');

        Route::get('/{id}/delete', 'Admin\CategoryPostController@deleteCategory');

        Route::post('/{id}/update', 'Admin\CategoryPostController@updateCategory');
    });

    //* Comment
    Route::prefix('comment')->group(function () {
        Route::get('/', 'Admin\CommentController@renderArchiveComment');

        Route::get('/{id}/delete', 'Admin\CommentController@deleteComment');

        Route::post('/{id}/delete', 'Admin\CommentController@deletePostComment');
    });

    //* Product
    Route::prefix('product')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/product/all');
        });

        Route::get('/all', 'Admin\ProductController@renderArchiveProduct');

        Route::get('/new', 'Admin\ProductController@renderNewProduct');

        Route::post('/new', 'Admin\ProductController@createProduct');

        Route::get('/{id}', 'Admin\ProductController@renderSingleProduct');

        Route::get('/{id}/delete', 'Admin\ProductController@deleteProduct');

        Route::post('/{id}/update', 'Admin\ProductController@updateProduct');
    });

    //* Category Product
    Route::prefix('category-product')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/category-product/all');
        });

        Route::get('/all', 'Admin\CategoryProductController@renderArchiveCategory');

        Route::post('/new', 'Admin\CategoryProductController@createCategory');

        Route::get('/{id}', 'Admin\CategoryProductController@renderSingleCategory');

        Route::get('/{id}/delete', 'Admin\CategoryProductController@deleteCategory');

        Route::post('/{id}/update', 'Admin\CategoryProductController@updateCategory');
    });
});
