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

// Route::get('/', function () {
//     return view('templates/dashboard');
// });
Route::get('/', 'App\Http\Controllers\SingleController@index');
Route::get('/supplier', 'App\Http\Controllers\SingleController@supplierview');
Route::get('/satuan', 'App\Http\Controllers\SingleController@barangsatuanview');
Route::get('/jenis', 'App\Http\Controllers\SingleController@barangjenisview');
Route::get('/barang', 'App\Http\Controllers\SingleController@barangbarangview');
Route::get('/barangmasuk', 'App\Http\Controllers\SingleController@barangmasukview');
Route::get('/barangkeluar', 'App\Http\Controllers\SingleController@barangkeluarview');
Route::get('/laporan', 'App\Http\Controllers\SingleController@laporanview');
