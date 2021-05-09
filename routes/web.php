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

// edit view
Route::get('/supplier/edit/{id}', 'App\Http\Controllers\SingleController@supplieredit');
Route::get('/satuan/edit/{id}', 'App\Http\Controllers\SingleController@satuanedit');
Route::get('/jenis/edit/{id}', 'App\Http\Controllers\SingleController@jenisedit');
Route::get('/barang/edit/{id}', 'App\Http\Controllers\SingleController@barangedit');

// insert
Route::post('/supplier/insert', 'App\Http\Controllers\SingleController@supplierinsert');
Route::post('/satuan/insert', 'App\Http\Controllers\SingleController@barangsatuaninsert');
Route::post('/jenis/insert', 'App\Http\Controllers\SingleController@barangjenisinsert');
Route::post('/barang/insert', 'App\Http\Controllers\SingleController@barangbaranginsert');
Route::post('/barangmasuk/insert', 'App\Http\Controllers\SingleController@barangmasukinsert');
Route::post('/barangkeluar/insert', 'App\Http\Controllers\SingleController@barangkeluarinsert');

// insert view
Route::get('/supplier/add', 'App\Http\Controllers\SingleController@supplierinsertview');
Route::get('/satuan/add', 'App\Http\Controllers\SingleController@barangsatuaninsertview');
Route::get('/jenis/add', 'App\Http\Controllers\SingleController@barangjenisinsertview');
Route::get('/barang/add', 'App\Http\Controllers\SingleController@barangbaranginsertview');
Route::get('/barangmasuk/add', 'App\Http\Controllers\SingleController@barangmasukinsertview');
Route::get('/barangkeluar/add', 'App\Http\Controllers\SingleController@barangkeluarinsertview');

// update
Route::post('/supplier/update', 'App\Http\Controllers\SingleController@supplierinsert');
Route::post('/satuan/update', 'App\Http\Controllers\SingleController@barangsatuaninsert');
Route::post('/jenis/update', 'App\Http\Controllers\SingleController@barangjenisinsert');
Route::post('/barang/update', 'App\Http\Controllers\SingleController@barangbaranginsert');
Route::post('/barangmasuk/update', 'App\Http\Controllers\SingleController@barangmasukinsert');
Route::post('/barangkeluar/update', 'App\Http\Controllers\SingleController@barangkeluarinsert');
