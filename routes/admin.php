<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\FlagMiddleware;
use Illuminate\Support\Facades\Route;


Route::middleware('permissions:admin')->group(function () {
    Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
    Route::resource('employees', EmployeeController::class);
});
