<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('post.home');
});

Route::get('posts/index', [PostController::class, 'index']);

Route::get('posts/create', [PostController::class, 'create']);

Route::post('posts', [PostController::class, 'store']);

Route::delete('posts/{post}', [PostController::class, 'destroy']);

Route::put('posts/{post}/edit', [PostController::class, 'edit']);