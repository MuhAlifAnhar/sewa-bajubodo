<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\DashboardController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', [SessionController::class, 'index'])->name('login')->middleware('guest');
// Route::post('/', [SessionController::class, 'index']);

Route::post('/login', [LoginController::class, 'index']);

// Route::get('/admin', [LoginController::class, 'admin'])->middleware('guest');

// Route::get('/registrasiadmin', [LoginController::class, 'akunbaruadmin'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [LoginController::class, 'akunbaru'])->middleware('guest');
Route::post('/registrasi', [LoginController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/produk', [DashboardController::class, 'produk'])->middleware('auth');
Route::get('/produk/{tokoId}', [DashboardController::class, 'produk'])->name('produk.byToko')->middleware('auth');
Route::post('/produk', [DashboardController::class, 'produk']);
Route::get('/kontak', [DashboardController::class, 'kontak'])->middleware('auth');
Route::get('/syarat', [DashboardController::class, 'syarat'])->middleware('auth');

Route::get('/admin', [DashboardController::class, 'admin'])->middleware('auth');
Route::resource('/admin/namatoko', TokoController::class)->middleware('auth');
Route::resource('/admin/produk', BajuController::class)->middleware('auth');

Route::get('/super', [DashboardController::class, 'super'])->middleware('auth');
Route::resource('/super/akun', UserController::class)->middleware('auth');