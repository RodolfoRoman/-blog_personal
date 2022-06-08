<?php

use Illuminate\Http\Request;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



 /**grupo de rutas */

Route::controller(PageController::class)->group(function(){
    Route::get('/',  'home')->name('home');
    Route::get('blog/{post:slug}','post')->name('post');
});


Route::redirect('dashboard', 'posts')->name('dashboard');

Route::resource('posts', PostController::class)->middleware(['auth'])->except(['show']);

require __DIR__.'/auth.php';
