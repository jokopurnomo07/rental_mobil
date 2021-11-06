<?php

use App\Http\Controllers\Dashboard\DashboardController;
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

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['namespace' => 'Merk'], function () {
        Route::resource('/merk', 'MerkController');
    });

    Route::group(['namespace' => 'Cars'], function () {
        Route::resource('/cars', 'CarsController');
    });

    Route::group(['namespace' => 'Pesanan'], function () {
        Route::resource('/pesanan', 'PesananController');
    });

    Route::group(['namespace' => 'User'], function () {
        Route::resource('/user', 'UserController');
    });

});

require __DIR__ . '/auth.php';
