<?php

use App\Http\Controllers\AddController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
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

Route::post('/signup', [UserController::class, 'store']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/users', [UserController::class, 'index']);
Route::get('/user/{id}', [UserController::class, 'show']);

Route::middleware("auth:sanctum")->group(function () {
    Route::post('/tags/create', [TagController::class, 'store']);
    Route::get('/tags', [TagController::class, 'index']);
    Route::patch('/tags/{tag}', [TagController::class, 'update']);
    Route::delete('/tags/{tag}', [TagController::class, 'destroy']);

    Route::post('/ads/create', [AddController::class, 'store']);
    Route::get('/ads', [AddController::class, 'index']);
    Route::get('/ads/{id}', [AddController::class, 'show']);
    Route::patch('/ads/{id}', [AddController::class, 'update']);
    Route::delete('/ads/{ads}', [AddController::class, 'destroy']);

});
