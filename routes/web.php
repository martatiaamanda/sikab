<?php

use App\Http\Controllers\Auth\custom\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Admin;
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
    Route::get('/', function () {
        return redirect('/dashboard')->with('error', 'anda tidak memiliki akses');
    });
    Route::get('/dashboard', function () {
        return view('dashboard')->with('status', 'anda tidak memiliki akses');
    })->name('dashboard');

    Route::prefix('/admin')->middleware(Admin::class)->group( function () {
        Route::get('/', function () {
                     dd('admin');
                })->name('admin.dashboard');
    });
});


// Route::prefix('admin')->
//     Route::get('/', function () {
//         return dd('admin');
//     });
// });

// Route::group(['middleware' => ['auth', 'verified']], function () {
//     Route::get('/logout')->;
// });

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });


// Route::get('login', function () {
//     return view('auth.login');});
