<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\AuthController;

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('orders', App\Http\Controllers\OrderController::class);
    Route::resource('hampers', App\Http\Controllers\HampersController::class);
    Route::resource('customers', App\Http\Controllers\CustomerController::class);
    Route::resource('settings', App\Http\Controllers\SettingController::class);
});
