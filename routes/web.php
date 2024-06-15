<?php

use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\AdminSuratController;
use App\Http\Controllers\Auth\custom\RegisterController;
use App\Http\Controllers\admin\LurahController;
use App\Http\Controllers\admin\NomorSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\user\BuatSuratController;
use App\Http\Controllers\user\RiwayatBansonControllercd;
use App\Http\Controllers\user\RiwayatSuratControllercd;
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

    // user routes
    Route::middleware(User::class)->group( function () {
        Route::get('/', function () {
            return redirect()->route('dashboard');
        });
        Route::get('/dashboard', function () {
            return view('user.dashboard');
        })->name('dashboard');
        Route::get("/buat-surat", [BuatSuratController::class, 'index'])->name('user.buat-surat');
        Route::get("/buat-surat/{slug}", [BuatSuratController::class, 'create'])->name('user.buat-surat.create');
        Route::post("/buat-surat/{slug}", [BuatSuratController::class, 'store'])->name('user.buat-surat.store');

        Route::get('/riwayat-surat', [RiwayatSuratControllercd::class, 'index'])->name('user.riwayat-surat');
        Route::get('/riwayat-surat/{id}/detail', [RiwayatSuratControllercd::class, 'show'])->name('user.riwayat-surat.show');
        Route::get('/riwayat-surat/{id}/edit', [RiwayatSuratControllercd::class, 'edit'])->name('user.riwayat-surat.edit');
        Route::put('/riwayat-surat/{id}/upedate', [BuatSuratController::class, 'update'])->name('user.surat.update');

        Route::get('/riwayat-bansos', [RiwayatBansonControllercd::class, 'index'])->name('user.riwayat-bansos');

    });


    // admin routes
    Route::prefix('/admin')->middleware([Admin::class])->group( function () {
        Route::get('/', function () {
            return redirect('/admin/dashboard');
        });
        Route::get('/dashboard', function () {
                    return view('admin.dashoard');
                })->name('admin.dashboard');

        Route::get('/user', [userController::class, 'index'])->name('admin.user');

        // Route::get('/user', [userController::class, 'index'])->name('user.admin.index');
        Route::get('/user/{id}/show', [userController::class, 'show'])->name('admin.user.show');
        Route::get('/user/{id}/edit', [userController::class, 'edit'])->name('admin.user.edit');
        Route::put('/user/{id}/update', [userController::class, 'update'])->name('admin.user.update');


        Route::get('/lurah', [LurahController::class, 'index'])->name('admin.lurah');
        Route::put('/lurah/{id}', [LurahController::class, 'update'])->name('admin.lurah.update');

        Route::get('/nomor-surat', [NomorSuratController::class, 'index'])->name('admin.nomor-surat');
        Route::put('/nomor-surat/{id}', [NomorSuratController::class, 'update'])->name('admin.nomor-surat.update');

        Route::get('/surat', [AdminSuratController::class, 'index'])->name('admin.surat');
        Route::get('/surat/pengajuan', [AdminSuratController::class, 'pengajuan'])->name('admin.pengajuan');
        Route::get('/surat/done', [AdminSuratController::class, 'done'])->name('admin.done');

        Route::get('/surat/{id}/show', [AdminSuratController::class, 'show'])->name('admin.surat.show');
        Route::get('/surat/{id}/edit', [AdminSuratController::class, 'edit'])->name('admin.surat.edit');

        Route::put('/surat/{id}/konfirmasi', [AdminSuratController::class, 'konfirmasi'])->name('admin.surat.konfirmasi');
        Route::get('/surat/{id}/cetak', function() {
            dd('cetak');
        })->name('admin.surat.cetak');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update_data'])->name('profile.update');
    Route::put('/profile/photo', [ProfileController::class, 'update_foto'])->name('profile.update.photo');
});
