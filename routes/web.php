<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware(\App\Http\Middleware\OnlyGuestMiddleware::class)->group(function() {
    Route::controller(\App\Http\Controllers\AuthController::class)->group(function() {
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('/forgot-password', 'showForgotPasswordForm');
        Route::post('/forgot-password', 'forgotPassword');
        Route::get('/reset-password', 'showResetPasswordForm');
        Route::post('/reset-password', 'resetPassword');
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
