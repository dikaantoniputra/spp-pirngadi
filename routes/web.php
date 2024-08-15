<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
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


Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', [AuthController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'admin', 'middleware' => 'role:admin'], function () {
        // Route::get('/', function () {
        //     return view('page.index');
        // })->name('admin.dashboard');

        Route::get('/', [HomeController::class, 'index'])->name('admin.dashboard');

        Route::resource('user', UserController::class);
        Route::resource('siswa', SiswaController::class);
    });
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('tagihan', TagihanController::class);
});

Route::get('/', function () {
    return view('login.index');
});