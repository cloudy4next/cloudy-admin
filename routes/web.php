<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Auth\AuthController;
use App\Http\Controllers\Admin\DashboardController;

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

Route::redirect('/', '/login', 301);

Route::middleware('guest')->group(function () {

    Route::get('/login', [AuthController::class, 'loginShow'])->name('login');
    Route::post('login', [AuthController::class, 'loginCheck'])->name('login.check');


    Route::get('register', [AuthController::class, 'registerShow'])->name('register');
    Route::post('register', [AuthController::class, 'register'])->name('register.store');

    Route::post('reset', [AuthController::class, 'reset'])->name('password.reset');

});

Route::middleware('auth')->group(function () {

    Route::get("/dashboard",[DashboardController::class,'dashboard']);
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');


});

