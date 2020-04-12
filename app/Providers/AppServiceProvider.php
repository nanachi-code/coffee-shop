<?php

namespace App\Providers;

use App\CategoryProduct;
use App\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

use Illuminate\Support\Facades\Schema;

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
        if (Schema::hasTable('post') && Schema::hasTable('category_product')) {
            $data = array(
                'recentBlog' => Post::orderBy('updated_at', 'DESC')->take(3)->get(),
                'category' => CategoryProduct::orderBy('name', 'asc')->get(),
            );
            View::share('data', $data);
        }

        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }
}
