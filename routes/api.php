<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JWTController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;

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

Route::group([
    'prefix' => 'auth'
], function ($router) {
    Route::post('/login', [JWTController::class, 'login']);
    Route::post('/register', [JWTController::class, 'register']);
    Route::post('/logout', [JWTController::class, 'logout']);
    Route::post('/refresh', [JWTController::class, 'refresh']);
    Route::post('/client/login', [JWTController::class, 'clientlogin']);
});

Route::group([
    'middleware' => 'auth:api'
], function ($router) {
    Route::get('/user-profile', [UserController::class, 'userProfile']);
    Route::post('/addPhoto', [HomeController::class, 'addphoto']);
});