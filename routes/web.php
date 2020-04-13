<?php

use App\Http\Controllers\WebController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
Route::prefix('/blog')->group(function () {
    Route::get('/', 'Main\PostController@blogList');

    Route::get('/{id}', 'Main\PostController@blogCateList');

    Route::get('/post/{id}', 'Main\PostController@singlePost');

    Route::post('/post-comment-{id}', 'Main\PostController@commentStore');
});

// end blog
Auth::routes();
Route::prefix('/category')->group(function () {
    Route::get('/product/{id}', 'WebController@categoryProduct');

    Route::get('/all', "WebController@categoryAll");

    Route::get('/{id}', 'WebController@categoryOne');
});
//cart start
Route::get("/shopping/{id}", "WebController@shopping")->middleware("auth");

Route::get('/cart', "WebController@cart")->middleware("auth");

Route::get("/clearCart/{id}", "WebController@clearOneCart");

Route::get('/checkout', "WebController@checkout")->middleware("auth");
Route::post("checkout", 'WebController@placeOrder')->middleware("auth");

Route::get('/menu', "WebController@menu");
//cart end

//user start by Thai code
Auth::routes();

Route::get('/user/profile', "WebController@userProfile")->middleware("auth");;

Route::post('user/profile/update/{id}', "WebController@userProfileUpdate")->middleware("auth");;
Route::post("changePassword", "WebController@changePassword")->middleware("auth");;


Route::get('/user/order', "WebController@userOrder")->middleware("auth");;
Route::get('/user/order/{id}', "WebController@userOrderDetail")->middleware("auth");;
//user end by Thai code
Auth::routes();

Route::get('logout', function () {
    Auth::logout();
    return redirect('/login');
});

//* Admin routes
Route::group([
    'prefix' => 'admin',
    'middleware' => ['auth', CheckAdmin::class]
], function () {
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

        Route::post('/{id}/restore', 'Admin\ProductController@restoreProduct');
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

    //* User
    Route::prefix('user')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/user/all');
        });

        Route::get('/all', 'Admin\UserController@renderArchiveUser');

        Route::get('/new', 'Admin\UserController@renderNewUser');

        Route::post('/new', 'Admin\UserController@createUser');

        Route::get('/{id}', 'Admin\UserController@renderSingleUser');

        Route::post('/{id}/update', 'Admin\UserController@updateUser');

        Route::get('/{id}/disable', 'Admin\UserController@disableUser');

        Route::get('/{id}/restore', 'Admin\UserController@restoreUser');
    });

    //* Order
    Route::prefix('order')->group(function () {
        Route::get('/', function () {
            return redirect('/admin/order/all');
        });

        Route::get('/all', 'Admin\OrderController@renderArchiveOrder');

        Route::get('/new', 'Admin\OrderController@renderNewOrder');

        Route::post('/new', 'Admin\OrderController@createOrder');

        Route::get('/{id}', 'Admin\OrderController@renderSingleOrder');

        Route::post('/{id}/update', 'Admin\OrderController@updateOrder');
    });
});


Route::post('/sendemail/send', 'WebController@send');

Route::get('/user-table', "WebController@userTable");
Route::post("submitTable", "WebController@submitTable");


