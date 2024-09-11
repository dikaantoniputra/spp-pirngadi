<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LaporanTransakasi;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Models\Tagihan;

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




Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {

        Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::resource('user', UserController::class);
        Route::resource('siswa', SiswaController::class);
        Route::resource('tagihan', TagihanController::class);
        Route::resource('transaksi', TransaksiController::class);
        Route::get('/laporan-tk', [LaporanTransakasi::class, 'index'])->name('laporan-tk');
        Route::get('/laporan-sd', [LaporanTransakasi::class, 'sd'])->name('laporan-sd');
        Route::get('/laporan-smp', [LaporanTransakasi::class, 'smp'])->name('laporan-smp');
        Route::get('/laporan-sma', [LaporanTransakasi::class, 'sma'])->name('laporan-sma');

        Route::get('/tabel-sma', [LaporanTransakasi::class, 'smatabel'])->name('tabel-sma');
        Route::get('/tabel-smp', [LaporanTransakasi::class, 'smptabel'])->name('tabel-smp');
        Route::get('/tabel-sd', [LaporanTransakasi::class, 'sdtabel'])->name('tabel-sd');
        Route::get('/tabel-tk', [LaporanTransakasi::class, 'tktabel'])->name('tabel-tk');
    });

    // Route::group(['prefix' => 'admin', 'middleware' => 'role:admin', 'as'=>'kasir.'], function () {

    //     Route::get('/', [HomeController::class, 'index'])->name('kasir.dashboard');

    //     Route::resource('transaksi', TransaksiController::class);
    //     Route::get('/laporan-tk', [LaporanTransakasi::class, 'index'])->name('laporan-tk');
    //     Route::get('/laporan-sd', [LaporanTransakasi::class, 'sd'])->name('laporan-sd');
    //     Route::get('/laporan-smp', [LaporanTransakasi::class, 'smp'])->name('laporan-smp');
    //     Route::get('/laporan-sma', [LaporanTransakasi::class, 'sma'])->name('laporan-sma');

    //     Route::get('/tabel-sma', [LaporanTransakasi::class, 'smatabel'])->name('tabel-sma');
    //     Route::get('/tabel-smp', [LaporanTransakasi::class, 'smptabel'])->name('tabel-smp');
    //     Route::get('/tabel-sd', [LaporanTransakasi::class, 'sdtabel'])->name('tabel-sd');
    //     Route::get('/tabel-tk', [LaporanTransakasi::class, 'tktabel'])->name('tabel-tk');
    // });
   
});

Route::get('/', function () {
    return view('login.index');
});