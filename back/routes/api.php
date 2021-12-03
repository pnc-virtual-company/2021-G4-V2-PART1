<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
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

// Public route
Route::post('/signup', [UserController::class, 'signup']);
Route::post('/signin', [UserController::class, 'signin']);


// Private route
Route::group(['middleware' => ['auth:sanctum']], function(){
    Route::post('/signout', [UserController::class, 'signout']);
});

Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories',[CategoryController::class, 'store']);
Route::get('/categories/{id}',[CategoryController::class, 'show']);
Route::put('/categories/{id}',[CategoryController::class, 'update']);
Route::delete('/categories/{id}',[CategoryController::class, 'destroy']);
