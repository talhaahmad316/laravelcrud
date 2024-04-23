<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(["prefix" => "/"], function () {
    Route::group(["middleware" => "guest"], function () {
        Route::get('loginpage', [AuthController::class, 'loginpage'])->name('loginpage');
        Route::post('login', [AuthController::class, 'login'])->name('login');
        Route::get('registerpage', [AuthController::class, 'registerpage'])->name('registerpage');
        Route::post('register', [AuthController::class, 'register'])->name('register');
    });
    Route::group(["middleware" => "auth"], function () {
        Route::get('logout', [AuthController::class, 'logout'])->name('logout');
        Route::resource('student', DataController::class);
    });
});