<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApprovePeminjamanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\LaporanPeminjamanController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransaksiPeminjamanController;
use App\Http\Controllers\PerusahaanPersewaanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/dashboard/roles', RoleController::class)->except('show')->middleware('admin');
    Route::resource('/dashboard/users', UserController::class)->middleware('admin');
    Route::resource('/dashboard/regions', RegionController::class)->except('show')->middleware('admin');
    Route::resource('/dashboard/perusahaan-persewaans', PerusahaanPersewaanController::class)->except('show')->middleware('admin');
    Route::resource('/dashboard/kendaraans', KendaraanController::class)->middleware('admin');

    Route::get('/dashboard/transaksi-peminjamans', [TransaksiPeminjamanController::class, 'index']);
    Route::get('/dashboard/transaksi-peminjamans/create', [TransaksiPeminjamanController::class, 'transaksiPeminjaman']);
    Route::post('/dashboard/transaksi-peminjamans/store', [TransaksiPeminjamanController::class, 'store']);
    Route::put('/dashboard/transaksi-peminjamans/destroy/{id}', [TransaksiPeminjamanController::class, 'destroy']);

    Route::get('/dashboard/approve-peminjamans', [ApprovePeminjamanController::class, 'index']);
    Route::put('/dashboard/approve-peminjamans/edit/{id}', [ApprovePeminjamanController::class, 'edit']);
    Route::put('/dashboard/approve-peminjamans/destroy/{id}', [ApprovePeminjamanController::class, 'destroy']);

    Route::get('/dashboard/laporan-peminjamans', [LaporanPeminjamanController::class, 'index']);

    Route::get('dashboard/profile', [ProfileController::class, 'index']);
    Route::get('dashboard/profile/edit-profile', [ProfileController::class, 'edit']);
});

