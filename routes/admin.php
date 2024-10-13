<?php

use App\Http\Controllers\Admin\DashBoardController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\FlagMiddleware;
use App\Models\Phone;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashBoardController::class, 'index'])->name('dashboard');
Route::resource('employees', EmployeeController::class);

// User 1-1
Route::get('/users', function () {
    $users = User::with(['phone'])->latest('id')->paginate(20);

    return view('admin.users.index', compact('users'));
})->name('users.index');

Route::get('/users/{id}/role', function ($id) {

    $roles = [1, 2, 3, 4, 5];

    $user = User::find($id);

    $user->roles()->attach($roles);


    dd($user->load('roles')->toArray());
})->name('users.role');


Route::get('/users/{id}/remove-role', function ($id) {

    $roles = [4, 5];

    $user = User::find($id);

    $user->roles()->detach($roles);

    dd($user->load('roles')->toArray());
})->name('users.remove-role');


Route::get('/users/{id}/sync-role', function ($id) {
    $roles = [6, 7, 8];

    $user = User::find($id);

    $user->roles()->sync($roles);

    dd($user->load('roles')->toArray());
})->name('users.remove-role');


// Phone 1-1
Route::get('/phone/{id}', function ($id) {
    $phone = Phone::with('user')->find($id);

    dd($phone->user);
});

// Post 1-N
Route::get('/posts/{id}', function ($id) {
    $post = Post::with('comments')->find($id);

    dd($post->toArray());
});

// Comment 1-N


Route::resource('students', StudentController::class);

Route::get('transaction', [TransactionController::class, 'index'])->name('transaction.index');
Route::post('transaction/start', [TransactionController::class, 'start'])->name('transaction.start');

Route::post('transaction/cancel', [TransactionController::class, 'cancel'])->name('transaction.cancel');
Route::post('transaction/confirm', [TransactionController::class, 'confirm'])->name('transaction.confirm');
Route::post('transaction/pay', [TransactionController::class, 'pay'])->name('transaction.pay');

// Route::middleware('permissions:admin')->group(function () {



// });
