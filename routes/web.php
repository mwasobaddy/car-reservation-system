<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\Login;
use App\Livewire\Register;
use App\Livewire\ContactForm;
use App\Controllers\OtpController;

Route::get('/', Home::class)->name('home');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');
Route::get('/contact', ContactForm::class)->name('contact');

Route::middleware(['auth.otp'])->group(function () {
    Route::get('/otp-verify', [OtpController::class, 'show'])->name('otp.verify');
    Route::post('/otp-verify', [OtpController::class, 'verify'])->name('otp.validate');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});