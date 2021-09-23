<?php

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
    return view('welcome');
});
Route::get('/qr', function () {
    return view('qr');
});

Route::post('/encode','DecodeController@encode')->name('encode.barcode');
Route::post('/decode','DecodeController@decode')->name('decode.barcode');
