<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\FlagMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', FlagMiddleware::class])->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
    Route::resource('employees', EmployeeController::class);

    Route::get('/luxchill', [DashBoardController::class, 'index'])->withoutMiddleware('auth');
});
