<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// User
Route::post('login','Api\AuthController@login');
Route::post('register','Api\AuthController@register');
Route::get('logout','Api\AuthController@logout');
Route::post('save_user_info','Api\AuthController@saveUserInfo')->middleware('jwtAuth');
Route::get('show_info_user','Api\AuthController@show_info_user')->middleware('jwtAuth');

//Salon
Route::post('getSalon','Api\SalonController@getSalon');
Route::get('getSalonFeature','Api\SalonController@getSalonFeature');
Route::get('getSalonById/{id}','Api\SalonController@getSalonById');

// Dịch vụ
Route::get('getDichvu','Api\DichvuController@getDichVu');
// Dịch vụ
Route::get('getDichVuBySalon/{id_salon}','Api\DichvuController@getDichVuBySalon');

//Lịch hẹn
Route::post('DatLich','Api\LichhenController@DatLich');
Route::get('getLichHenSapToi','Api\LichhenController@getLichHenSapToi')->middleware('jwtAuth');

//Nhân viên
Route::get('getNhanVienBySalon/{gio},{id_salon}','Api\NhanVienController@getNhanVienBySalon');


// Yêu thích
Route::post('YeuThich','Api\YeuThichController@yeuthich');