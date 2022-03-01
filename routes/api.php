<?php

use App\Models\User;
use Illuminate\Http\JsonResponse;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/users', function (Request $request){
    return new JsonResponse([
        'Url' => $request->url()
    ]);
});

Route::get('/users/{user}', function (User $user){
    return new JsonResponse([
        'Data' => $user
    ]);
});

Route::post('/users/{user}', function (User $user){
    return new JsonResponse([
        'Data' => "Post Request"
    ]);
});

Route::patch('/users/{user}', function (User $user){
    return new JsonResponse([
        'Data' => 'Update Request'
    ]);
});

Route::delete('/users/{user}', function (User $user){
    return new JsonResponse([
        'Data' => 'Delete Request'
    ]);
});