<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Http;

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
            $response = Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
            $valutes = $response->json();
            $kursData['usd'] = $valutes[0]['Rate'];
            $kursData['eur'] = $valutes[1]['Rate'];
            $kursData['rub'] = $valutes[2]['Rate'];

            $view->with(compact('categories', 'valutes', 'kursData'));
        });

        view()->composer('sections.popular', function($view){
            $popularPosts = \App\Models\Post::limit(4)->orderBy('id', 'DESC')->get();
            $view->with(compact('popularPosts'));
        });


    }
}
