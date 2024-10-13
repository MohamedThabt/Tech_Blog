<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

Route::get('/', [PostController::class, 'home'])->name('home');

Route::get('posts/index', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/create', [PostController::class, 'create']);

Route::get('posts/search', [PostController::class, 'search'])->name('posts.search');

Route::post('posts', [PostController::class, 'store']);

Route::delete('posts/{post}', [PostController::class, 'destroy']);

Route::put('posts/{post}/edit', [PostController::class, 'edit']);

Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show');

Route::resource('users', UserController::class);

Route::get('user/{id}/posts',[UserController::class,'posts'])->name('user.posts');