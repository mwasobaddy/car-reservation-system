<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home\Home;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\ContactForm;
use App\Livewire\Dashboard\Dashboard;
use App\Controllers\Auth\OtpController;

// Guest routes
Route::middleware('guest')->group(function () {
    Route::get('/', Home::class)->name('home');
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
    Route::get('/contact', ContactForm::class)->name('contact');
});

// OTP verification routes
Route::middleware(['auth.otp'])->group(function () {
    Route::get('/otp-verify', [OtpController::class, 'show'])->name('otp.verify');
    Route::post('/otp-verify', [OtpController::class, 'verify'])->name('otp.validate');
});

// Authenticated routes with Jetstream
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    // Other authenticated routes
});