<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\UserController;
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


Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/logout', [AuthController::class, 'logout']);

    Route::get('/course', [CourseController::class, 'index']);
    Route::post('/course', [CourseController::class, 'store']);
    Route::put('/course/{course}', [CourseController::class, 'update']);
    Route::delete('/course/{course}', [CourseController::class, 'destroy']);
    Route::delete('/course/{course}/vinculate-user', [CourseController::class, 'vinculateUser']);

 
    Route::get('/card', [CardController::class, 'index']);
    Route::post('/card', [CardController::class, 'store']);
    Route::put('/card/{card}', [CardController::class, 'update']);
    Route::delete('/card/{card}', [CardController::class, 'destroy']);


});
