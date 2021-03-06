<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SalonWebController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NhanVienWebController;
use App\Http\Controllers\DichVuWebController;
use App\Http\Controllers\LichHenWebController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// web
Route::get('/admin/login', function () {
    return view('admin.login');
});

Route::post('/admin/login', [SalonWebController::class, 'loginPost'])->name('admin.loginPost');
Route::post('/admin/register', [SalonWebController::class, 'registerPost'])->name('admin.registerPost');
Route::get('/admin/logout', [SalonWebController::class, 'logout'])->name('admin.logout');
Route::get('/admin/dashboard', [SalonWebController::class, 'dashboard']) ->name('admin.dashboard');

Route::middleware(['admin'])->group(function () {
    Route::get('/admin/dashboard', [SalonWebController::class, 'dashboard']) ->name('admin.dashboard');
    Route::get('/admin/listing/{model}', [ListingController::class, 'index']) ->name('listing.index');
    Route::get('/admin/salon', [SalonWebController::class, 'showSalon']) ->name('salon.showSalon');
    Route::post('/admin/salon', [SalonWebController::class, 'updateSalon']) ->name('salon.updateSalon');
    Route::get('/admin/nhanvien', [NhanVienWebController::class, 'showNhanVien'])->name('nhanvien.showNhanVien');
    Route::get('/admin/nhanvien/create', [NhanVienWebController::class, 'show'])->name('nhanvien.show');
    Route::post('/admin/nhanvien/create', [NhanVienWebController::class, 'createNhanVien'])->name('nhanvien.createNhanVien');
    Route::get('/admin/nhanvien/delete/{id}', [NhanVienWebController::class, 'deleteNhanVien'])->name('nhanvien.deleteNhanVien');
    Route::get('/admin/nhanvien/update/{id}', [NhanVienWebController::class, 'showUpdateNhanVien'])->name('nhanvien.showUpdateNhanVien');
    Route::post('/admin/nhanvien/update', [NhanVienWebController::class, 'updateNhanVien'])->name('nhanvien.updateNhanVien');

    Route::get('/admin/dichvu', [DichVuWebController::class, 'show'])->name('dichvu.show');
    Route::get('/admin/dichvu/create', [DichVuWebController::class, 'showCreate'])->name('dichvu.showCreate');
    Route::post('/admin/dichvu/create', [DichVuWebController::class, 'createDichVu'])->name('dichvu.createDichVu');
    Route::get('/admin/dichvu/delete/{id}', [DichVuWebController::class, 'delete'])->name('dichvu.deleteDichvu');
    Route::get('/admin/dichvu/update/{id}', [DichVuWebController::class, 'showUpdate'])->name('dichvu.showUpdate');
    Route::post('/admin/dichvu/update', [DichVuWebController::class, 'update'])->name('dichvu.update');

    Route::get('/admin/lichhen/show/{status}', [LichHenWebController::class, 'show'])->name('lichhen.show');
    Route::get('/admin/lichhen/update/{id}/{status}', [LichHenWebController::class, 'update'])->name('lichhen.update');

    Route::get('/admin/location', [SalonWebController::class, 'locationView'])->name('salon.location');
    Route::post('/admin/location', [SalonWebController::class, 'locationUpdate'])->name('salon.location.update');

});