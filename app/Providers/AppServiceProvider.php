<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrap();

        view()->composer('layouts.layout', function($view){
            $categories = \App\Models\Category::all();
            $view->with(compact('categories'));
        });

        view()->composer('sections.popular', function($view){
            $popularPosts = \App\Models\Post::limit(4)->orderBy('id', 'DESC')->get();
            $view->with(compact('popularPosts'));
        });


    }
}
