<?php

use App\Http\Controllers\ArchiveController;
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
    Route::put('/course/{course}/vinculate-user', [CourseController::class, 'vinculateUser']);
    Route::get('/course/{course}/user', [CourseController::class, 'showCourseUsers']);


    Route::get('/card', [CardController::class, 'index']);
    Route::post('/card', [CardController::class, 'store']);
    Route::put('/card/{card}', [CardController::class, 'update']);
    Route::get('/card/{card}', [CardController::class, 'show']);
    Route::delete('/card/{card}', [CardController::class, 'destroy']);
    Route::put('/card/{card}/order', [CardController::class, 'updateOrder']);

    Route::post('/archive', [ArchiveController::class, 'store']);
    Route::post('/archive/image', [ArchiveController::class, 'storeImage']);
});
Route::get('/archive/download', [ArchiveController::class, 'downloadArchive']);
Route::get('/archive/image', [ArchiveController::class, 'getImage']);
