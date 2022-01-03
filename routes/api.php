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

//Salon
Route::post('getSalon','Api\SalonController@getSalon');
Route::get('getSalonFeature','Api\SalonController@getSalonFeature');

// Dịch vụ
Route::get('getDichvu','Api\DichvuController@getDichVu');

//Lịch hẹn


// Nhân viên