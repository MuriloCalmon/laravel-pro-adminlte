<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('home');
    })->name('home');

    Route::get('/users', [UserController::class, 'index'])->name('user.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/users/create', [UserController::class, 'store'])->name('user.store');

    Route::get('/users/{user}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
    Route::put('/users/{user}/profile', [UserController::class, 'updateProfile'])->name('user.updateProfile');
    Route::put('/users/{user}/interests', [UserController::class, 'updateInterests'])->name('user.updateInterests');
    Route::put('/users/{user}/roles', [UserController::class, 'updateRoles'])->name('user.updateRoles');

    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
});
