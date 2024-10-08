<?php

use App\Http\Controllers\admin\userController;
use App\Http\Controllers\admin\AdminSuratController;
use App\Http\Controllers\admin\bansosController as AdminBansosController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\ExportController;
use App\Http\Controllers\Auth\custom\RegisterController;
use App\Http\Controllers\admin\LurahController;
use App\Http\Controllers\admin\NomorSuratController;
use App\Http\Controllers\PrintController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SuratPindahController;
use App\Http\Controllers\user\BansosController;
use App\Http\Controllers\user\BuatSuratController;
use App\Http\Controllers\user\RiwayatBansonControllercd;
use App\Http\Controllers\user\RiwayatSuratControllercd;
use App\Http\Controllers\UserDocumenController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\User;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Route;

// auth routes
require __DIR__ . '/auth.php';
Route::group(['middleware' => ['guest']], function () {
    Route::get('/', function () {
        return redirect('/login');
    });
    // Route::get('/register', [RegisterController::class, 'index'])->name('register');
    // Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::group(['middleware' => ['auth', 'verified']], function () {

    // user routes
    Route::middleware(User::class)->group(function () {
        Route::get('/', function () {
            return redirect()->route('user.buat-surat');
        });

        // user buat surat
        Route::get("/buat-surat", [BuatSuratController::class, 'index'])->name('user.buat-surat');
        Route::get("/buat-surat/pindah", [SuratPindahController::class, 'create'])->name('user.buat-surat.pindah.create');
        Route::post("/buat-surat/pindah", [SuratPindahController::class, 'store'])->name('user.buat-surat.pindah.store');
        Route::get("/buat-surat/{slug}", [BuatSuratController::class, 'create'])->name('user.buat-surat.create');
        Route::post("/buat-surat/{slug}", [BuatSuratController::class, 'store'])->name('user.buat-surat.store');


        // user surat pindah
        Route::get('/riwayat-surat/pindah/{id}/detail', [SuratPindahController::class, 'show'])->name('user.riwayat-surat.pindah.show');
        Route::get('/riwayat-surat/pindah/{id}/edit', [SuratPindahController::class, 'edit'])->name('user.riwayat-surat.pindah.edit');
        Route::put('/riwayat-surat/pindah/{id}/update', [SuratPindahController::class, 'update'])->name('user.riwayat-surat.pindah.update');

        // user surat
        Route::get('/riwayat-surat', [RiwayatSuratControllercd::class, 'index'])->name('user.riwayat-surat');
        Route::get('/riwayat-surat/{id}/detail', [RiwayatSuratControllercd::class, 'show'])->name('user.riwayat-surat.show');
        Route::get('/riwayat-surat/{id}/edit', [RiwayatSuratControllercd::class, 'edit'])->name('user.riwayat-surat.edit');
        Route::delete('/riwayat-surat/{id}/delete', [RiwayatSuratControllercd::class, 'destroy'])->name('user.riwayat-surat.delete');
        Route::put('/riwayat-surat/{id}/upedate', [BuatSuratController::class, 'update'])->name('user.surat.update');

        // user bansos
        Route::get('/riwayat-bansos', [BansosController::class, 'index'])->name('user.riwayat-bansos');
        Route::get('/riwayat-bansos/{id}/detail', [BansosController::class, 'show'])->name('user.riwayat-bansos.show');
        Route::get('/riwayat-bansos/{id}/edit', [BansosController::class, 'edit'])->name('user.riwayat-bansos.edit');
        Route::delete('/riwayat-bansos/{id}/delete', [BansosController::class, 'destroy'])->name('user.riwayat-bansos.delete');
        Route::put('/riwayat-bansos/{id}/update', [BansosController::class, 'update'])->name('user.bansos.update');
        Route::get('/bansos/create', [BansosController::class, 'create'])->name('user.bansos.create');
        Route::post('/bansos/create', [BansosController::class, 'store'])->name('user.bansos.store');
    });


    // admin routes
    Route::prefix('/admin')->middleware([Admin::class])->group(function () {
        // admin dashboard
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');


        // admin user
        Route::get('/user', [userController::class, 'index'])->name('admin.user');
        Route::get('/user/create', [userController::class, 'create'])->name('admin.user.create');
        Route::post('/user/create', [userController::class, 'store'])->name('admin.user.store');
        Route::get('/user/{id}/show', [userController::class, 'show'])->name('admin.user.show');
        Route::get('/user/{id}/edit', [userController::class, 'edit'])->name('admin.user.edit');
        Route::put('/user/{id}/update', [userController::class, 'update'])->name('admin.user.update');
        Route::delete('/user/{id}/delete', [userController::class, 'destroy'])->name('admin.user.delete');
        Route::put('/user/{id}/update/password', [userController::class, 'updatePassword'])->name('admin.user.update.password');

        // admin lurah
        Route::get('/lurah', [LurahController::class, 'index'])->name('admin.lurah');
        Route::put('/lurah/{id}', [LurahController::class, 'update'])->name('admin.lurah.update');

        // admin nomor surat
        Route::get('/nomor-surat', [NomorSuratController::class, 'index'])->name('admin.nomor-surat');
        Route::put('/nomor-surat/update', [NomorSuratController::class, 'update'])->name('admin.nomor-surat.update');

        // admin surat
        Route::get('/surat', [AdminSuratController::class, 'index'])->name('admin.surat');
        Route::get('/surat/pengajuan', [AdminSuratController::class, 'pengajuan'])->name('admin.pengajuan');
        Route::get('/surat/done', [AdminSuratController::class, 'done'])->name('admin.done');
        Route::get('/surat/{slug}', [AdminSuratController::class, 'jenis'])->name('admin.surat.jenis');
        Route::get('/surat/pindah/{id}/show', [AdminSuratController::class, 'showPindah'])->name('admin.surat.pindah.show');
        Route::get('/surat/{id}/show', [AdminSuratController::class, 'show'])->name('admin.surat.show');
        Route::put('/surat/{id}/konfirmasi', [AdminSuratController::class, 'konfirmasi'])->name('admin.surat.konfirmasi');

        // admin bansos
        Route::get('/bansos', [AdminBansosController::class, 'index'])->name('admin.bansos.index');
        Route::get('/bansos/pengajuan', [AdminBansosController::class, 'pengajuan'])->name('admin.bansos-pengajuan');
        Route::get('/bansos/done', [AdminBansosController::class, 'done'])->name('admin.bansos-done');
        Route::get('/bansos/{id}/show', [AdminBansosController::class, 'show'])->name('admin.bansos.show');
        Route::put('/bansos/{id}/konfirmasi', [AdminBansosController::class, 'konfirmasi'])->name('admin.bansos.konfirmasi');


        // export data bansos
        Route::get('/export/bansos', [ExportController::class, 'index'])->name('admin.export.bansos');
    });

    // print surat
    Route::get('/riwayat-surat/{id}/cetak', [PrintController::class, 'view'])->name('user.riwayat-surat.cetak');
    Route::get('/riwayat-surat/{id}/cetak/download', [PrintController::class, 'cetak'])->name('user.riwayat-surat.pindah.cetak');

    // user profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update_data'])->name('profile.update');
    Route::put('/profile/photo', [ProfileController::class, 'update_foto'])->name('profile.update.photo');
    Route::put('/profile/password', [ProfileController::class, 'update_password'])->name('profile.update.password');

    // user document
    Route::post('profile/document', [UserDocumenController::class, 'store'])->name('profile.upload.document.store');
    Route::put('profile/document', [UserDocumenController::class, 'update'])->name('profile.upload.document.update');
});
