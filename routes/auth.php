<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;

Route::get('/register', function () {
    return view('Auth.register');
});
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', function () {
    return view('Auth.login');
})->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// Forgot Password Routes
Route::get('/forgot-password', function () {
    return view('Auth.forgot-password');
})->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'forgotPassword'])->name('password.email');

// Reset Password Routes
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');
