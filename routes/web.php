<?php

use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\AdminSuratController;
use App\Http\Controllers\admin\bansosController as AdminBansosController;
use App\Http\Controllers\Auth\custom\RegisterController;
use App\Http\Controllers\admin\LurahController;
use App\Http\Controllers\admin\NomorSuratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratPindahController;
use App\Http\Controllers\user\BansosController;
use App\Http\Controllers\user\BuatSuratController;
use App\Http\Controllers\user\RiwayatBansonControllercd;
use App\Http\Controllers\user\RiwayatSuratControllercd;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use Illuminate\Support\Facades\Redis;
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
        Route::get("/buat-surat/pindah", [SuratPindahController::class, 'create'])->name('user.buat-surat.pindah.create');
        Route::post("/buat-surat/pindah", [SuratPindahController::class, 'store'])->name('user.buat-surat.pindah.store');
        Route::get("/buat-surat/{slug}", [BuatSuratController::class, 'create'])->name('user.buat-surat.create');
        Route::post("/buat-surat/{slug}", [BuatSuratController::class, 'store'])->name('user.buat-surat.store');





        Route::get('/riwayat-surat', [RiwayatSuratControllercd::class, 'index'])->name('user.riwayat-surat');
        Route::get('/riwayat-surat/{id}/detail', [RiwayatSuratControllercd::class, 'show'])->name('user.riwayat-surat.show');
        Route::get('/riwayat-surat/{id}/edit', [RiwayatSuratControllercd::class, 'edit'])->name('user.riwayat-surat.edit');
        Route::put('/riwayat-surat/{id}/upedate', [BuatSuratController::class, 'update'])->name('user.surat.update');

        Route::get('/riwayat-bansos', [BansosController::class, 'index'])->name('user.riwayat-bansos');
        Route::get('/riwayat-bansos/{id}/detail', [BansosController::class, 'show'])->name('user.riwayat-bansos.show');
        Route::get('/riwayat-bansos/{id}/edit', [BansosController::class, 'edit'])->name('user.riwayat-bansos.edit');
        Route::put('/riwayat-bansos/{id}/update', [BansosController::class, 'update'])->name('user.bansos.update');

        Route::get('/bansos/create', [BansosController::class, 'create'])->name('user.bansos.create');
        Route::post('/bansos/create', [BansosController::class, 'store'])->name('user.bansos.store');
    });


    // admin routes
    Route::prefix('/admin')->middleware([Admin::class])->group( function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
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
        // Route::get('/surat/{id}/edit', [AdminSuratController::class, 'edit'])->name('admin.surat.edit');

        Route::put('/surat/{id}/konfirmasi', [AdminSuratController::class, 'konfirmasi'])->name('admin.surat.konfirmasi');
        // Route::get('/surat/{id}/cetak', function() {
        //     dd('cetak');
        // })->name('admin.surat.cetak');

        //

        Route::get('/bansos', [AdminBansosController::class, 'index'])->name('admin.bansos');
        Route::get('/bansos/pengajuan', [AdminBansosController::class, 'pengajuan'])->name('admin.bansos-pengajuan');
        Route::get('/bansos/done', [AdminBansosController::class, 'done'])->name('admin.bansos-done');

        Route::get('/bansos/{id}/show', [AdminBansosController::class, 'show'])->name('admin.bansos.show');
        // Route::get('/bansos/{id}/edit', [AdminBansosController::class, 'edit'])->name('admin.bansos.edit');

        Route::put('/bansos/{id}/konfirmasi', [AdminBansosController::class, 'konfirmasi'])->name('admin.bansos.konfirmasi');
        // Route::get('/bansos/{id}/cetak', function() {
        //     dd('cetak');
        // })->name('admin.bansos.cetak');
    });

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update_data'])->name('profile.update');
    Route::put('/profile/photo', [ProfileController::class, 'update_foto'])->name('profile.update.photo');
});
