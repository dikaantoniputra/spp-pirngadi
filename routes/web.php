<?php

use App\Models\Tagihan;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TuSmaController;
use App\Http\Controllers\TuSmpController;
use App\Http\Controllers\LaporanTransakasi;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\TuSdController;
use App\Http\Controllers\TuTkController;

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
    return view('login.index');
});
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

        Route::get('/tabel-sma-du', [LaporanTransakasi::class, 'smatabeldu'])->name('tabel-sma.du');
        Route::get('/tabel-smp-du', [LaporanTransakasi::class, 'smptabeldu'])->name('tabel-smp.du');
        Route::get('/tabel-tk-du', [LaporanTransakasi::class, 'tktabeldu'])->name('tabel-tk.du');
        Route::get('/tabel-sd-du', [LaporanTransakasi::class, 'sdtabeldu'])->name('tabel-sd.du');
        
        Route::get('/tabel-sma', [LaporanTransakasi::class, 'smatabel'])->name('tabel-sma');
        Route::get('/tabel-smp', [LaporanTransakasi::class, 'smptabel'])->name('tabel-smp');
        Route::get('/tabel-sd', [LaporanTransakasi::class, 'sdtabel'])->name('tabel-sd');
        Route::get('/tabel-tk', [LaporanTransakasi::class, 'tktabel'])->name('tabel-tk');
    });

    Route::group(['prefix' => 'yayasan', 'middleware' => 'role:yayasan', 'as'=>'yayasan.'], function () {

        Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::resource('siswa', SiswaController::class);       
        Route::resource('transaksi', TransaksiController::class);
        Route::get('/laporan-tk', [LaporanTransakasi::class, 'index'])->name('laporan-tk');
        Route::get('/laporan-sd', [LaporanTransakasi::class, 'sd'])->name('laporan-sd');
        Route::get('/laporan-smp', [LaporanTransakasi::class, 'smp'])->name('laporan-smp');
        Route::get('/laporan-sma', [LaporanTransakasi::class, 'sma'])->name('laporan-sma');

        Route::get('/tabel-sma-du', [LaporanTransakasi::class, 'smatabeldu'])->name('tabel-sma.du');
        Route::get('/tabel-smp-du', [LaporanTransakasi::class, 'smptabeldu'])->name('tabel-smp.du');
        Route::get('/tabel-tk-du', [LaporanTransakasi::class, 'tktabeldu'])->name('tabel-tk.du');
        Route::get('/tabel-sd-du', [LaporanTransakasi::class, 'sdtabeldu'])->name('tabel-sd.du');
        
        Route::get('/tabel-sma', [LaporanTransakasi::class, 'smatabel'])->name('tabel-sma');
        Route::get('/tabel-smp', [LaporanTransakasi::class, 'smptabel'])->name('tabel-smp');
        Route::get('/tabel-sd', [LaporanTransakasi::class, 'sdtabel'])->name('tabel-sd');
        Route::get('/tabel-tk', [LaporanTransakasi::class, 'tktabel'])->name('tabel-tk');
    });


    Route::group(['prefix' => 'kepala-unit-sma', 'middleware' => 'role:kepala-unit-sma', 'as'=>'sma.'], function () {

        Route::get('/', [TuSmaController::class, 'index'])->name('admin.dashboard');
        Route::get('/siswa', [TuSmaController::class, 'siswa'])->name('siswa');      
        Route::get('/kelas-10', [TuSmaController::class, 'kelas10'])->name('kelas.10');
        Route::get('/kelas-11', [TuSmaController::class, 'kelas11'])->name('kelas.11');
        Route::get('/kelas-12', [TuSmaController::class, 'kelas12'])->name('kelas.12');
        Route::get('/tabel-sma', [LaporanTransakasi::class, 'smatabel'])->name('tabel-sma');
        Route::get('/laporan-sma', [LaporanTransakasi::class, 'sma'])->name('laporan-sma');
        Route::get('/tabel-sma-du', [LaporanTransakasi::class, 'smatabeldu'])->name('tabel-sma.du');
       
    });

    Route::group(['prefix' => 'kepala-unit-smp', 'middleware' => 'role:kepala-unit-smp', 'as'=>'smp.'], function () {
        Route::get('/', [TuSmpController::class, 'index'])->name('admin.dashboard');
        Route::get('/siswa', [TuSmpController::class, 'siswa'])->name('siswa');
        Route::get('/kelas-7', [TuSmpController::class, 'kelas7'])->name('kelas.7');
        Route::get('/kelas-8', [TuSmpController::class, 'kelas8'])->name('kelas.8');
        Route::get('/kelas-9', [TuSmpController::class, 'kelas9'])->name('kelas.9');
        Route::get('/tabel-smp', [LaporanTransakasi::class, 'smptabel'])->name('tabel-smp');
        Route::get('/laporan-smp', [LaporanTransakasi::class, 'smp'])->name('laporan-smp');
        Route::get('/tabel-smp-du', [LaporanTransakasi::class, 'smptabeldu'])->name('tabel-smp.du'); 
    });

    Route::group(['prefix' => 'kepala-unit-sd', 'middleware' => 'role:kepala-unit-sd', 'as'=>'sd.'], function () {
        Route::get('/', [TuSdController::class, 'index'])->name('admin.dashboard');
        Route::get('/siswa', [TuSdController::class, 'siswa'])->name('siswa');
        Route::get('/kelas-1', [TuSdController::class, 'kelas1'])->name('kelas.1');
        Route::get('/kelas-2', [TuSdController::class, 'kelas2'])->name('kelas.2');
        Route::get('/kelas-3', [TuSdController::class, 'kelas3'])->name('kelas.3');
        Route::get('/kelas-4', [TuSdController::class, 'kelas4'])->name('kelas.4');
        Route::get('/kelas-5', [TuSdController::class, 'kelas5'])->name('kelas.5');
        Route::get('/kelas-6', [TuSdController::class, 'kelas6'])->name('kelas.6');
        Route::get('/tabel-sd', [LaporanTransakasi::class, 'sdtabel'])->name('tabel-sd');
        Route::get('/laporan-sd', [LaporanTransakasi::class, 'sd'])->name('laporan-sd');
        Route::get('/tabel-sd-du', [LaporanTransakasi::class, 'sdtabeldu'])->name('tabel-sd.du'); 
    });

    Route::group(['prefix' => 'kepala-unit-tk', 'middleware' => 'role:kepala-unit-tk', 'as'=>'tk.'], function () {
        Route::get('/', [TuTkController::class, 'index'])->name('admin.dashboard');
        Route::get('/siswa', [TuTkController::class, 'siswa'])->name('siswa');
        Route::get('/kelas-a', [TuTkController::class, 'kelasA'])->name('kelas.A');
        Route::get('/kelas-b', [TuTkController::class, 'kelasB'])->name('kelas.B');
        Route::get('/kelas-kb', [TuTkController::class, 'kelasKB'])->name('kelas.KB');
        Route::get('/tabel-tk', [LaporanTransakasi::class, 'tktabel'])->name('tabel-tk');
        Route::get('/laporan-tk', [LaporanTransakasi::class, 'tk'])->name('laporan-tk');
        Route::get('/tabel-tk-du', [LaporanTransakasi::class, 'tktabeldu'])->name('tabel-tk.du');
    });

   
});

