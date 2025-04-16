<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;
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

Route::get('/', [SessionController::class, 'index'])->middleware('guest');
Route::get('/login', [SessionController::class, 'login'])->name('login');
//->name('login')
// Route::post('/', [SessionController::class, 'index']);

Route::post('/login', [LoginController::class, 'index']);

// Route::get('/admin', [LoginController::class, 'admin'])->middleware('guest');

// Route::get('/registrasiadmin', [LoginController::class, 'akunbaruadmin'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [LoginController::class, 'akunbaru'])->middleware('guest');
Route::post('/registrasi', [LoginController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('guest');
Route::get('/produk', [DashboardController::class, 'produk'])->middleware('guest');
Route::get('/produk/{tokoId}', [DashboardController::class, 'produk'])->name('produk.byToko')->middleware('guest');
Route::post('/produk', [DashboardController::class, 'produk'])->middleware('guest');
Route::post('/produk/update-status', [DashboardController::class, 'updateStatus'])->name('produk.updateStatus');
Route::get('/kontak', [DashboardController::class, 'kontak'])->middleware('guest');
Route::get('/syarat', [DashboardController::class, 'syarat'])->middleware('guest');

Route::get('/admin', [DashboardController::class, 'admin'])->middleware('auth');
Route::resource('/admin/namatoko', TokoController::class)->middleware('auth');
Route::resource('/admin/produk', BajuController::class)->middleware('auth');

Route::get('/super', [DashboardController::class, 'super'])->middleware('auth');
Route::resource('/super/akun', UserController::class)->middleware('auth');
Route::resource('/super/request', AdminController::class)->middleware('auth');
