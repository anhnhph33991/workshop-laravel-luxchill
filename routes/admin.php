<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
Route::resource('employees', EmployeeController::class);
