<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::prefix('v1')->group(function () {
    // require __DIR__ . '/api/v1/users.php';
    // require __DIR__ . '/api/v1/posts.php';
    // require __DIR__ . '/api/v1/comments.php';

    $path = __dir__ . '/api/v1';
    \App\Helpers\Routes\RouteHelper::includeRouteFiles($path);

});

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

//if (\Illuminate\Support\Facades\App::environment('local')) {
//    Route::get('/playground', function (){
//        return (new \App\Mail\WelcomeEmail(\App\Models\User::factory()->make()))->render();
//    });
//}


