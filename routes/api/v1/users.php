<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// use GuzzleHttp\Middleware;

// Route::get('/users', function (Request $request) {
//     return new JsonResponse([
//         'Url' => $request->url()
//     ]);
// });

// Route::get('/users/{user}', function (User $user) {
//     return new JsonResponse([
//         'Data' => $user
//     ]);
// });

// Route::post('/users', function (User $user) {
//     return new JsonResponse([
//         'Data' => "Post Request"
//     ]);
// });

// Route::patch('/users/{user}', function (User $user) {
//     return new JsonResponse([
//         'Data' => 'Update Request'
//     ]);
// });

// Route::delete('/users/{user}', function (User $user) {
//     return new JsonResponse([
//         'Data' => 'Delete Request'
//     ]);
// });

// Route::Resource('users', UserController::class);
// Route::apiResource('users', UserController::class);

// Route::get('/users', [UserController::class, 'index']);
// Route::get('/users/{user}', [UserController::class, 'show']);
// Route::post('/users', [UserController::class, 'store']);
// Route::patch('/users/{user}', [UserController::class, 'update']);
// Route::delete('/users/{user}', [UserController::class, 'destroy']);

// Route::middleware('auth')
//     ->prefix('v1')
//     ->name('users.')
//     ->namespace('\App\Http\Controllers')
//     ->group(function () {
//         Route::get('/users', 'UserController@index')->name('index');
//         Route::get('/users/{user}', 'UserController@show')->name('show');
//         Route::post('/users', 'UserController@store')->name('store');
//         Route::patch('/users/{user}', 'UserController@update')->name('update');
//         Route::delete('/users/{user}', 'UserController@destroy')->name('destroy');
//     });

Route::group([
    'middleware' => 'auth',
    // 'prefix' => 'v1',
    'as' => 'users.',
    // 'namespace' => '\App\Http\Controllers',
], function () {
    Route::get('/users', [UserController::class, 'index'])->name('index')
        ->withoutMiddleware('auth');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('show')
        ->withoutMiddleware('auth')
        // ->where('user', '[0-9]+');
        ->whereNumber('user');
    Route::post('/users', [UserController::class, 'store'])->name('store');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('destroy');
});