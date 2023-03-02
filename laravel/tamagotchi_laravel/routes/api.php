<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AllatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KedvencController;

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

Route::post('/login', [UserController::class, 'authenticate']);
Route::get('/logout', [UserController::class, 'logout']);
Route::post('/newuser', [UserController::class, 'store']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [UserController::class, 'index']);
    Route::get('/user/{id}', [UserController::class, 'show']);
    Route::put('/edituser/{id}', [UserController::class, 'update']);
    Route::delete('/deleteuser/{id}', [UserController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/pets', [KedvencController::class, 'index']);
    Route::get('/pet/{id}', [KedvencController::class, 'show']);
    Route::post('/newpet', [KedvencController::class, 'store']);
    Route::put('/editpet/{id}', [KedvencController::class, 'update']);
    Route::put('/editpetstat/{id}', [KedvencController::class, 'updateStat']);
    Route::delete('/deletepet/{id}', [KedvencController::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/animals', [AllatController::class, 'index']);
    Route::get('/animal/{id}', [AllatController::class, 'show']);
    Route::post('/newanimal', [AllatController::class, 'store']);
});
