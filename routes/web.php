<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\TambahDataMahasiswaController;
use App\Http\Controllers\TambahDataMatkulController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//LOGIN
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

//DASHBOARD ADMIN
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/dashboard', [ChartController::class, 'getChartData']);
// Route::get('/admin/dashboard', [ChartController::class, 'alamat']);

//DATA MAHASISWA
Route::get('/admin/datamahasiswa', [AdminDashboardController::class, 'datamahasiswa'])->name('admin.datamahasiswa');
Route::get('/admin/tambahdatamahasiswa', [TambahDataMahasiswaController::class, 'create'])->name('admin.tambahdatamahasiswa');
Route::post('/admin/tambahdatamaha', [TambahDataMahasiswaController::class, 'store'])->name('admin.tambahdatamaha');

//DATA MATKUL
Route::get('/admin/datamatkul', [AdminDashboardController::class, 'datamatkul'])->name('admin.datamatkul');
Route::get('/admin/matkuls/sort', [AdminDashboardController::class, 'sort']);
Route::get('/admin/tambahdatamatkul', [TambahDataMatkulController::class, 'create'])->name('admin.tambahdatamatkul');

//DASHBOARD USER
Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//ROOT
Route::get('/', function () {
    return view('auth.login');
});
