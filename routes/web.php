<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardUserController;
use App\Http\Controllers\DashboardLokasiController;
use App\Http\Controllers\DashboardUserAdminController;
use App\Http\Controllers\DashboardUserDiverController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// halaman landaing page
Route::get('/',[LandingController::class, 'index'])->middleware('guest');
Route::get('/About',[LandingController::class, 'about'])->middleware('guest');
Route::get('/DaftarLokasi',[LandingController::class, 'lokasi'])->middleware('guest');
Route::get('/PetaLokasi',[LandingController::class, 'peta'])->middleware('guest');
Route::get('/DaftarLokasi/{id}',[LandingController::class, 'detail'])->middleware('guest');
Route::get('/Login',[LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/Login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/Register',[RegisterController::class, 'index'])->middleware('guest');
Route::post('/Register',[RegisterController::class, 'store']);
Route::post('/ulasan/{id}',[LandingController::class, 'store']);

// halamat admin

Route::get('/dashboard',[AdminController::class, 'Dashboard'])->middleware('auth');
Route::get('/dashboard/{daftar_lokasi}/showtest',[DashboardLokasiController::class, 'showtest'])->middleware('auth');

Route::get('image/upload', [DashboardLokasiController::class, 'upload']);
Route::get('image/{lokasi}/imgdelete', [DashboardLokasiController::class, 'imgdelete']);
Route::post('image/upload/{lokasi}/store', [DashboardLokasiController::class, 'fileStore']);

Route::resource('/dashboard/daftar-lokasi', DashboardLokasiController::class)->middleware('auth');

Route::resource('/dashboard/users', DashboardUserDiverController::class)->middleware('admin');

Route::resource('/dashboard/admins', DashboardUserAdminController::class)->middleware('admin');
