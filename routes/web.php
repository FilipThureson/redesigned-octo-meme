<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;


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

Route::get('/', [ViewController::class, "index"]);

Route::get('/login', [ViewController::class, "login"]);

Route::get('/register', [ViewController::class, "register"]);

Route::get('/forgot/password', [ViewController::class, "forgotPassword"]);

Route::get('/reset/{token}',[ViewController::class, "resetPassword"]);

