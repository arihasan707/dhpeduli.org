<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\DonasiController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\DonationController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/akun', [AkunController::class, 'index'])->name('akun.index');

// Route::get('/user', function () {
//     return view('akun');
// })->middleware(['auth', 'verified'])->name('dashboard');

// route detail
Route::get('detail/{program:slug}', [HomeController::class, 'show'])->name('detail');

// route donatur detail
Route::get('detail/{program:slug}/donatur', [HomeController::class, 'show'])->name('donatur');

Route::get('detail/{program:slug}/news', [HomeController::class, 'news'])->name('news');

// route like
Route::post('donatur/like', [HomeController::class, 'like'])->name('like');

// route donasi    
Route::post('donasi/transaksi', [DonasiController::class, 'transaksi'])->name('transaksi');
Route::post('donasi/charge', [DonasiController::class, 'charge'])->name('charge');
Route::get('donasi/{program:slug}', [DonasiController::class, 'index'])->name('donasi');
Route::get('payment/{donasi:kode}/{slug}', [DonasiController::class, 'payment'])->name('payment');
Route::get('payment/success/{donasi:kode}/{slug}', [DonasiController::class, 'payment_success'])->name('success');
Route::get('payment/expire/{donasi:kode}/{slug}', [DonasiController::class, 'payment_expire'])->name('expire');
Route::get('payment', [DonasiController::class, 'expire_midtrans'])->name('expire.midtrans');

//route program berdasarkan kategori 
Route::get('program', [ProgramController::class, 'index'])->name('program');

Route::get('lp/program-makan', function () {
    return view('landing_page.program-makan');
});
//route tentang
Route::get('page/tentang', function () {
    return view('tentang');
})->name('tentang');

//route kontak
Route::get('page/kontak', function () {
    $nomorWa = "+6285215112369";
    $pesan =
        "Assalammu'alaikum Warahmatullah 
Wabarakatuh 
              
Saya ingin bertanya terkait program donasi";

    $encodedPesan = urlencode($pesan);
    // dd($encodedPesan);
    $whatsappLink = "https://wa.me/" . $nomorWa . "?text=" . $encodedPesan;
    return view('kontak', compact('whatsappLink'));
})->name('kontak');

//route faq
Route::get('page/faq', function () {
    return view('faq');
})->name('faq');

//route berita
Route::get('berita/{berita:slug?}', [BeritaController::class, 'index'])->name('berita');

//route search
Route::get('program/search', [ProgramController::class, 'search'])->name('search');

//route donasi saya
Route::get('donation', [DonationController::class, 'index'])->name('donation');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
require __DIR__ . '/admin-auth.php';
