<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
Use App\Http\Controllers\MerekController;
Use App\Http\Controllers\TransaksiController;
Use App\Http\Controllers\PetugasController;
Use App\Http\Controllers\ProductDistributorController;
Use App\Http\Controllers\BarangController;
Use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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
    return view('auth/login');
});

Auth::routes();

Route::resource('transaksis', TransaksiController::class);
Route::resource('petugass', PetugasController::class);
Route::resource('barangs', BarangController::class);
Route::resource('users', UserController::class);
Route::resource('distributors', ProductDistributorController::class);
Route::resource('mereks', MerekController::class);
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
Route::get('home', [HomeController::class, 'index'])->name('home');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');