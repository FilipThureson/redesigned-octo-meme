<?php

use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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

Route::post('/login/auth', [UserController::class, 'loginAuth']);

Route::post('/register', [UserController::class, 'register']);

Route::post('/forgot/password', [UserController::class, 'forgotPassword']);

Route::post('/reset/password', [UserController::class, 'resetPassword']);

Route::post('/logout', [UserController::class, 'logout']);

Route::post('/upload', [PostsController::class, 'upload']);

Route::post('/profile/{id}', [ProfileController::class, 'index']);

Route::post('/profile/{id}/follow', [ProfileController::class, 'follow']);



