<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
use App\Http\Middleware\Isloggedin;
use App\Http\Middleware\IsNotloggedin;

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
Route::middleware([Isloggedin::class])->group(function(){

    Route::get('/', [ViewController::class, "index"]);

    Route::get('/upload', [ViewController::class, 'upload']);

    Route::get('/profile/{id}', [ViewController::class, 'profile'])->where('id', '[0-9]+');

    Route::get('/profile/edit', [ViewController::class, 'edit']);
});

Route::middleware([IsNotloggedin::class])->group(function(){

    Route::get('/login', [ViewController::class, "login"]);

    Route::get('/register', [ViewController::class, "register"]);

    Route::get('/forgot/password', [ViewController::class, "forgotPassword"]);

    Route::get('/reset/{token}',[ViewController::class, "resetPassword"]);

});
