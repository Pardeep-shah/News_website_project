<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/profile', function () {
        return view('auth.my_profile');
    })->name('profile');

    // Two-Factor Authentication Routes
    Route::get('/twofa/prompt', [AuthController::class, 'showTwoFAPrompt'])->name('twofa.prompt');
    Route::get('/twofa/enable', [AuthController::class, 'showEnableTwoFA'])->name('twofa.enable');
    Route::post('/twofa/verify', [AuthController::class, 'verifyTwoFA'])->name('twofa.verify');
    // routes/web.php
    Route::get('/twofa/generate', [AuthController::class, 'generateTwoFA'])->name('twofa.generate');
});



Route::get('/test-email', function () {
    try {
        Mail::raw('This is a test email from Laravel using Gmail SMTP!', function ($message) {
            $message->to('pardeep88514@gmail.com') // 👈 change this
                ->subject('SMTP Test - Laravel');
        });
        return '✅ Test email sent successfully!';
    } catch (\Exception $e) {
        return '❌ Error sending email: ' . $e->getMessage();
    }
});
