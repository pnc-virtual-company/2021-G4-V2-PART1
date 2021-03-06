<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\JoinController;


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



// ________________________Event_________________________ //
Route::get('events', [EventController::class, 'index']);
Route::post('events', [EventController::class, 'store']);
Route::get('events/{id}', [EventController::class, 'show']);
Route::put('events/{id}', [EventController::class, 'update']);
Route::delete('events/{id}', [EventController::class, 'destroy']);
Route::get('/events/search/{eventTitle}',[EventController::class, 'search']);


// ________________________Category______________________ //
Route::get('/categories',[CategoryController::class, 'index']);
Route::post('/categories',[CategoryController::class, 'store']);
Route::get('/categories/{id}',[CategoryController::class, 'show']);
Route::put('/categories/{id}',[CategoryController::class, 'update']);
Route::delete('/categories/{id}',[CategoryController::class, 'destroy']);
Route::get('/categories/search/{categoryName}',[CategoryController::class, 'search']);
Route::get('/categories/sort/name',[CategoryController::class, 'sort']);


// ________________________Join_________________________ //
Route::get('/joinevent', [JoinController::class, 'index']);
Route::post('/joinevent', [JoinController::class, 'store']);
Route::delete('/joinevent/{id}', [JoinController::class, 'destroy']);