<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataAdminController;
use App\Http\Controllers\Admin\DataResepsionisController;
use App\Http\Controllers\Admin\DataTamuController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\KamarController;
use \App\Http\Controllers\Admin\FasilitasUmumController;
use App\Http\Controllers\Admin\ResepsionisController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Resepsionis\DataReservasiController;
use App\Models\DataReservasi;
use App\Models\DataTamu;

// Rute untuk halaman utama yang menampilkan view 'welcome'
Route::get('/', function () {
    return view('index'); // Mengembalikan tampilan 'welcome'
});

Route::get('/', [HomeController::class, 'index'])->name('index');


// Rute untuk halaman login, hanya dapat diakses oleh pengguna yang belum login (guest)
Route::get('/login', [\App\Http\Controllers\AuthController::class, 'index'])->name('login')->middleware('guest');
// Rute untuk memproses form login, menggunakan metode 'verify' dari AuthController
Route::post('/login', [\App\Http\Controllers\AuthController::class, 'verify'])->name('auth.verify');

// Rute yang hanya dapat diakses oleh admin yang sudah terautentikasi
Route::group(['middleware' => 'auth:admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::resource('home', DataTamuController::class);
    Route::resource('data-admin', DataAdminController::class);
    Route::resource('data-resepsionis', DataResepsionisController::class);
    Route::resource('data-tamu', DataTamuController::class);
    Route::resource('kamar', KamarController::class);
    Route::resource('fasilitas-umum', FasilitasUmumController::class);
    // Route::resource('dashboard', DashboardController::class);
});

Route::group(['middleware' => 'auth:resepsionis', 'prefix' => 'resepsionis', 'as' => 'resepsionis.'], function () {
    Route::resource('data-reservasi', DataReservasiController::class);
});
// Rute yang hanya dapat diakses oleh resepsionis yang sudah terautentikasi

// Rute yang hanya dapat diakses oleh pengguna biasa yang sudah terautentikasi
Route::group(['middleware' => 'auth:user'], function () {
    // Rute untuk halaman dashboard pengguna
    Route::get('/user/home', [\App\Http\Controllers\User\UserController::class, 'index'])->name('user.dashboard.index');
});

// Rute untuk menampilkan form registrasi pengguna
Route::get('/register', [AuthController::class, 'register'])->name('register');

// Rute untuk menangani proses registrasi pengguna
Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

// Rute untuk logout, memanggil metode 'logout' dari AuthController
Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
