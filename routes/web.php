<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::middleware(\App\Http\Middleware\OnlyGuestMiddleware::class)->group(function() {
    Route::controller(\App\Http\Controllers\AuthController::class)->group(function() {
        Route::get('/register', 'showRegistrationForm');
        Route::post('/register', 'register');
        Route::get('/account-setup', 'showAccountSetupForm')->name('account-setup');
        Route::post('/account-setup', 'accountSetup');
        Route::get('/login', 'showLoginForm')->name('login');
        Route::post('/login', 'login');
        Route::get('/forgot-password', 'showForgotPasswordForm');
        Route::post('/forgot-password', 'forgotPassword');
        Route::get('/reset-password', 'showResetPasswordForm');
        Route::post('/reset-password', 'resetPassword')->name('password.reset');
    });
});

Route::middleware('auth')->group(function() {
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
});
