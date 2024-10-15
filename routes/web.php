<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', [PostController::class, 'home'])->name('home');
Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');
Route::get('/home', [PostController::class, 'home'])->name('home');

// middel ware AUTH

Route::middleware('auth')->group(function(){
    Route::get('posts/index', [PostController::class, 'index'])->name('posts.index');

    Route::get('posts/create', [PostController::class, 'create']);

    Route::post('posts', [PostController::class, 'store']);

    Route::delete('posts/{post}', [PostController::class, 'destroy']);

    Route::put('posts/{post}/edit', [PostController::class, 'edit']);

    Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

    Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

    Route::resource('users', UserController::class)->middleware('can:admin-controller');

    Route::get('user/{id}/posts',[UserController::class,'posts'])->name('user.posts');
    
});
Auth::routes();