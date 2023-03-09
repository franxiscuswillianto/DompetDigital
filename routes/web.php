<?php

use App\Http\Controllers\DashboardAnakController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PemasukanController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\VerifikasiController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/bukapemasukan', [PemasukanController::class, 'create'])->name('pemasukan.create');
Route::post('/tambahpemasukan', [PemasukanController::class, 'store'])->name('pemasukan.store');
Route::get('/bukapengeluaran', [PengeluaranController::class, 'create'])->name('pengeluaran.create');
Route::post('/tambahpengeluaran', [PengeluaranController::class, 'store'])->name('pengeluaran.store');

Route::get('/dashboardanak', [DashboardAnakController::class, 'index'])->name('dashboardanak');
Route::get('/daftarpemasukan', [PemasukanController::class, 'index'])->name('pemasukan.daftar');
Route::get('/daftarpengeluaran', [PengeluaranController::class, 'index'])->name('pengeluaran.daftar');

Route::get('/verifikasi/{id}', [VerifikasiController::class, 'store'])->name('verifikasi');
Route::get('/hapus/{id}', [VerifikasiController::class, 'destroy'])->name('hapus');

Route::get('/detailtransaksi/{id}', [VerifikasiController::class, 'show'])->name('detail');
Route::post('/simpanperubahan', [VerifikasiController::class, 'edit'])->name('simpan');

Route::get('/pemasukansetahun', [DashboardController::class, 'pemasukanSetahun'])->name('masuk');
Route::get('/pengeluaransetahun', [DashboardController::class, 'pengeluaranSetahun'])->name('keluar');