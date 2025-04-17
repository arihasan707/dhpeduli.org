<?php

use App\Models\Banner;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Berita;
use App\Http\Controllers\Admin\TesController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BeritaController;
use App\Http\Controllers\Admin\DonasiController;
use App\Http\Controllers\Admin\ProgramController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ListBeritaController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Admin\Auth\LoginAdminController;
use App\Http\Controllers\Admin\BeritaPenyaluranController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Admin\Auth\RegisteredAdminController;
use App\Http\Controllers\Admin\Exports\DonasiExport;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;

Route::prefix('admin')->group(function () {
    Route::middleware('guest:admin')->group(function () {

        Route::post('register', [RegisteredAdminController::class, 'store'])
            ->name('admin.store');

        Route::get('/', [LoginAdminController::class, 'create'])
            ->name('admin.login');

        Route::post('login', [LoginAdminController::class, 'store'])
            ->name('login.store');
    });


    Route::middleware('admin')->group(function () {

        Route::get('register', [RegisteredAdminController::class, 'create'])
            ->name('admin.register');

        Route::get('dashboard', [DashboardController::class, 'index'])
            ->name('admin.dashboard');

        Route::resource('kategori', KategoriController::class);

        Route::resource('donasi', DonasiController::class);

        Route::resource('program', ProgramController::class);

        Route::resource('berita-penyaluran', BeritaPenyaluranController::class);

        Route::resource('berita', BeritaController::class);

        Route::resource('banner', BannerController::class);

        Route::get('berita-penyaluran/{id}/{program_id}', [ListBeritaController::class, 'show'])->name('list-berita.show');

        Route::post('berita-penyaluran/store', [ListBeritaController::class, 'store'])->name('list-berita.store');

        Route::resource('user', UserController::class);

        Route::get('verify-email', EmailVerificationPromptController::class)
            ->name('verification.notice');

        Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
            ->middleware(['signed', 'throttle:6,1'])
            ->name('verification.verify');

        Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
            ->middleware('throttle:6,1')
            ->name('verification.send');

        Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
            ->name('password.confirm');

        Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

        Route::get('export-donasi', [DonasiExport::class, 'index'])->name('donasi.export');

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [LoginAdminController::class, 'destroy'])
            ->name('admin.logout');
    });
});
