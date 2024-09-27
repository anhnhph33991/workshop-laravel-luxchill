<?php

use App\Http\Controllers\Client\HomeController;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);
