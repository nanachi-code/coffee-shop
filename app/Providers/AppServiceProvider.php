<?php

namespace App\Providers;

use App\Category;
use App\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // if (Post::hasTable('post') && Category::hasTable('category'))
        // {
        //     $data = array(
        //         'recent_blog' => $recent_blog = Post::orderBy('id', 'DESC')->take(3)->get(),
        //         'category' => $category = Category::orderBy('name','asc')->get(),
        //     );
        //     View::share('data',$data);
        // }
    }
}
