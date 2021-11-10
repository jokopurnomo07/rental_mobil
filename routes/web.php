<?php

use App\Http\Controllers\Dashboard\Booking\BookingController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\ProsesPinjam\ProsesPinjamController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::group(['prefix' => 'dashboard', 'namespace' => 'Dashboard', 'middleware' => 'auth'], function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::group(['namespace' => 'Cars'], function () {
        Route::resource('/cars', 'CarsController');
    });

    Route::group(['namespace' => 'Booking'], function () {
        Route::resource('/booking', 'BookingController');
        Route::get('/pesan/{id}', [BookingController::class, 'pesan'])->name('booking.pesan');
        Route::post('/konfirmasi', [BookingController::class, 'konfirmasi'])->name('booking.konfirmasi');
    });

    Route::group(['namespace' => 'ProsesPinjam'], function () {
        Route::resource('/proses-pinjam', 'ProsesPinjamController');
        Route::post('/kembali', [ProsesPinjamController::class, 'kembali'])->name('proses-pinjam.kembali');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::resource('/user', 'UserController');
    });

    Route::group(['namespace' => 'Selesai'], function () {
        Route::resource('/selesai', 'SelesaiController');
    });

    Route::group(['namespace' => 'RiwayatPesanan'], function () {
        Route::resource('/riwayat-pesanan', 'RiwayatPesananController');
    });
});

require __DIR__ . '/auth.php';
