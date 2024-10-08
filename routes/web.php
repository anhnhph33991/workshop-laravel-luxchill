<?php

use App\Helpers\Alert;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\PasswordResetController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Client\HomeController;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Auth::routes([
    'login' => false,
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/', [HomeController::class, 'index'])->name('home');

## b4-p1
Route::get('/movies', function () {
    echo "say hi page movies";
    die;
})->middleware('checkAge18');


## b4-p2

Route::middleware('permissions:admin,employee')->group(function () {

    Route::get('/orders', function () {
        echo "Say Hello Page Order";
        die;
    })->name('orders');
});

Route::middleware('permissions:admin,customer')->group(function () {

    Route::get('/profile', function () {
        echo "Say Hello Page profile";
        die;
    })->name('profile');
});


## b4-3

Route::get('/login', [LoginController::class, 'showFormLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [RegisterController::class, 'showFormRegister'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');
