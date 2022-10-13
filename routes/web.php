<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/home', [HomeController::class, 'index']);
Route::post('/home', [HomeController::class, 'store']);
Route::put('/home/{id}', [HomeController::class, 'update']);
Route::delete('/home/{id}', [HomeController::class, 'delete']);

// Route::get('/home', ['uses' => 'ppbvController@index']);

Route::get('/', [UserController::class, 'index']);
Route::post('/login',[UserController::class, 'auth']);
