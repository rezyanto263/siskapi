<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});

/**
 * * Guest Routes
 *
 * These routes are accessible only to unauthenticated users.
 */
Route::middleware('guest')->group(function() {
    // Authentication Route
    Route::controller(\App\Http\Controllers\AuthController::class)->group(function() {
        // Register
        Route::get('/register', 'showRegistrationForm')->name('register.form');
        Route::post('/register', 'register')->name('register');

        // Account Setup
        Route::get('/account-setup', 'showAccountSetupForm')->name('account.setup.form');
        Route::post('/account-setup', 'accountSetup')->name('account.setup');

        // Login
        Route::get('/login', 'showLoginForm')->name('login.form');
        Route::post('/login', 'login')->name('login');

        // Forgot Password
        Route::get('/forgot-password', 'showForgotPasswordForm')->name('password.forgot.form');
        Route::post('/forgot-password', 'forgotPassword')->name('password.forgot');

        // Reset Password
        Route::get('/reset-password', 'showResetPasswordForm')->name('password.reset.form');
        Route::post('/reset-password', 'resetPassword')->name('password.reset');
    });
});


/**
 * * Authenticated Routes
 *
 * These routes are accessible only to authenticated users.
 */
Route::middleware('auth')->group(function() {
    // Logout
    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    // Mahasiswa Route
    Route::middleware('role:mahasiswa')->prefix('/mahasiswa')->name('mahasiswa.')->group(function() {
        Route::controller(\App\Http\Controllers\Mahasiswa\DashboardController::class)->group(function() {
            Route::get('/dashboard', 'showDashboardView')->name('dashboard');
        });

        Route::controller(\App\Http\Controllers\Mahasiswa\KegiatanController::class)->group(function() {
            Route::get('/kegiatan', 'showKegiatanView')->name('kegiatan')->middleware('clean.query');
            Route::get('/kegiatan/{id}', 'showDetailKegiatanView')->name('kegiatan.detail');
        });

        Route::controller(\App\Http\Controllers\Mahasiswa\NotificationController::class)->group(function() {
            Route::get('/notification', 'showNotificationView')->name('notification');
        });
    });

    // Kepala Prodi Route

    // BAAK Route

    // UPAPKK Route
});
