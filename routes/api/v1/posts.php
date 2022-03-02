<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    // 'prefix' => 'v1',
    'as' => 'posts.',
    // 'namespace' => '\App\Http\Controllers',
], function () {
    Route::get('/posts', [PostController::class, 'index'])->name('index')
        ->withoutMiddleware('auth');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('show')
        ->withoutMiddleware('auth')
        // ->where('post', '[0-9]+');
        ->whereNumber('post');
    Route::post('/posts', [PostController::class, 'store'])->name('store')->withoutMiddleware('auth');
    Route::patch('/posts/{post}', [PostController::class, 'update'])->name('update')->withoutMiddleware('auth');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('destroy')->withoutMiddleware('auth');
});
