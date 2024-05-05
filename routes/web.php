<?php

use App\Http\Controllers\Auth\custom\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\BuatSuratController;
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
            return view('user.dashboard');
        })->name('dashboard');
        Route::get("/buat-surat", [BuatSuratController::class, 'index'])->name('user.buat-surat');
        Route::get("/buat-surat/{slug}", [BuatSuratController::class, 'create'])->name('user.buat-surat.create');
    });

    Route::prefix('/admin')->middleware([Admin::class])->group( function () {
        Route::get('/', function () {
            return redirect('/admin/dashboard');
        });
        Route::get('/dashboard', function () {
                    return view('admin.dashoard');
                })->name('admin.dashboard');
    });
});
