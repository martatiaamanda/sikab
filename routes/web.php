<?php

use App\Http\Controllers\Auth\custom\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use Illuminate\Support\Facades\Route;

// auth routes
require __DIR__.'/auth.php';
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    Route::get('/register', [RegisterController::class, 'index'])->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['middleware' => ['auth']], function () {
    Route::middleware(User::class)->group( function () {
        Route::get('/', function () {
            return redirect('/dashboard');
        });
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });

    Route::prefix('/admin')->middleware([Admin::class])->group( function () {
        Route::get('/dashboard', function () {
                    return view('admin.dashoard');
                })->name('admin.dashboard');
    });
});
