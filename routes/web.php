<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\TagController;

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

Route::get('/', [PagesController::class, 'index']);
Route::get('/category/{slug}', [PagesController::class, 'categoryPosts'])->name('categoryPosts');
Route::get('/singlePost/{id}', [PagesController::class, 'singlePost'])->name('singlePost');
Route::get('/contact', [PagesController::class, 'contact']);
Route::get('/search', [PagesController::class, 'search'])->name('search');
Route::post('/sendMail', [PagesController::class, 'sendMail'])->name('sendMail');

Route::get('lang/{lang}', function($lang){
    session(['lang'=>$lang]);
    return back();
});

Route::prefix('admin/')->middleware(['auth'])->group(function(){

    Route::get('home', function(){
        return view('admin.layouts.dashboard');
    })->name('admin.home');

    Route::resource('categories', CategoryController::class);
    Route::resource('posts', PostController::class);
    Route::resource('tags', TagController::class);
    Route::post('pos-image-upload', [PostController::class, 'upload'])->name('admin.upload');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
