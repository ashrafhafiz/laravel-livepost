<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'auth',
    // 'prefix' => 'v1',
    'as' => 'comments.',
    // 'namespace' => '\App\Http\Controllers',
], function () {
    Route::get('/comments', [CommentController::class, 'index'])
        ->name('index')->withoutMiddleware('auth');
    Route::get('/comments/{comment}', [CommentController::class, 'show'])
        ->name('show')->withoutMiddleware('auth')
        // ->where('comment', '[0-9]+');
        ->whereNumber('comment');
    Route::post('/comments', [CommentController::class, 'store'])
        ->name('store')->withoutMiddleware('auth');
    Route::patch('/comments/{comment}', [CommentController::class, 'update'])
        ->name('update')->withoutMiddleware('auth');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
        ->name('destroy')->withoutMiddleware('auth');
});
