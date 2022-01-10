<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SalonWebController;
use App\Http\Controllers\ListingController;

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
});