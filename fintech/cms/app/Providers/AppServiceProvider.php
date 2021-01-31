<?php

namespace App\Providers;

use App\Blog;
use App\Product;
use App\Setting;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        $settings = Setting::first();
        $all_products = Product::where('set_featured', 1)->pluck('title', 'id')->toArray();
        $blogs = Blog::count();
        view()->share(['settings' => $settings, 'all_products' => $all_products, 'blogs_count' => $blogs]);
    }
}
