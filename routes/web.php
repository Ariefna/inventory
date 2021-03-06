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

Route::get('/login', 'App\Http\Controllers\SingleController@login');
Route::post('/login', 'App\Http\Controllers\SingleController@login_request');
Route::get('/logout', 'App\Http\Controllers\SingleController@logout');
Route::get('/print/{id}', 'App\Http\Controllers\SingleController@print');
Route::get('/printk/{id}', 'App\Http\Controllers\SingleController@printk');
Route::get('/barang/getstok/{id}', 'App\Http\Controllers\SingleController@jsonbarang');
Route::post('/printmulti', 'App\Http\Controllers\SingleController@printmulti');
Route::post('/printmultik', 'App\Http\Controllers\SingleController@printkmulti');
Route::post('/supplier/insert', 'App\Http\Controllers\SingleController@supplierinsert');
Route::post('/satuan/insert', 'App\Http\Controllers\SingleController@barangsatuaninsert');
Route::post('/jenis/insert', 'App\Http\Controllers\SingleController@barangjenisinsert');
Route::post('/barang/insert', 'App\Http\Controllers\SingleController@barangbaranginsert');
Route::post('/barangmasuk/insert', 'App\Http\Controllers\SingleController@barangmasukinsert');

Route::post('/user/insert', 'App\Http\Controllers\SingleController@userinsert');


Route::middleware(['admin'])->group(function () {
// Route::get('/', 'App\Http\Controllers\SingleController@index');
// Route::get('/dashboard', 'App\Http\Controllers\SingleController@index');
// Route::get('/admin', 'App\Http\Controllers\SingleController@index');
// Route::get('/supplier', 'App\Http\Controllers\SingleController@supplierview');
// Route::get('/satuan', 'App\Http\Controllers\SingleController@barangsatuanview');
// Route::get('/jenis', 'App\Http\Controllers\SingleController@barangjenisview');
// Route::get('/barang', 'App\Http\Controllers\SingleController@barangbarangview');
// Route::get('/barangmasuk', 'App\Http\Controllers\SingleController@barangmasukview');

// Route::get('/barangkeluar', 'App\Http\Controllers\SingleController@barangkeluarview');
// Route::get('/approvebarangmasuk', 'App\Http\Controllers\SingleController@approvebarangmasukview');
// Route::get('/barangmasuk/approve/{id}', 'App\Http\Controllers\SingleController@approvebarangmasukdataview');

// Route::get('/laporan', 'App\Http\Controllers\SingleController@laporanview');
// Route::POST('/laporan/hasil/', 'App\Http\Controllers\SingleController@laporanhasilview');

// edit view
Route::get('/supplier/edit/{id}', 'App\Http\Controllers\SingleController@supplieredit');
Route::get('/satuan/edit/{id}', 'App\Http\Controllers\SingleController@satuanedit');
Route::get('/jenis/edit/{id}', 'App\Http\Controllers\SingleController@jenisedit');
Route::get('/barang/edit/{id}', 'App\Http\Controllers\SingleController@barangedit');

// insert


// insert view
// Route::get('/profile', 'App\Http\Controllers\SingleController@profileview');
// Route::get('/profile/setting', 'App\Http\Controllers\SingleController@profilesettingview');
// Route::get('/profile/ubahpassword', 'App\Http\Controllers\SingleController@profileubahpasswordview');
Route::get('/user', 'App\Http\Controllers\SingleController@userview');
Route::get('/user/edit/{id}', 'App\Http\Controllers\SingleController@usereditview');
Route::get('/user/add', 'App\Http\Controllers\SingleController@useraddview');


Route::get('/supplier/add', 'App\Http\Controllers\SingleController@supplierinsertview');
Route::get('/satuan/add', 'App\Http\Controllers\SingleController@barangsatuaninsertview');
Route::get('/jenis/add', 'App\Http\Controllers\SingleController@barangjenisinsertview');
Route::get('/barang/add', 'App\Http\Controllers\SingleController@barangbaranginsertview');
Route::get('/barangmasuk/add', 'App\Http\Controllers\SingleController@barangmasukinsertview');
Route::get('/barangmasuk/add/{id}', 'App\Http\Controllers\SingleController@barangmasukinsertviewdua');

// update

Route::post('/supplier/update', 'App\Http\Controllers\SingleController@supplierupdate');
Route::post('/satuan/update', 'App\Http\Controllers\SingleController@barangsatuanupdate');
Route::post('/jenis/update', 'App\Http\Controllers\SingleController@barangjenisupdate');
Route::post('/barang/update', 'App\Http\Controllers\SingleController@barangbarangupdate');
// Route::post('/user/update', 'App\Http\Controllers\SingleController@userupdate');
// Route::GET('/user/toggle/{id}', 'App\Http\Controllers\SingleController@usertoggleupdate');
// Route::post('/profile/setting/update', 'App\Http\Controllers\SingleController@profileupdate');

//delete
Route::get('/supplier/delete/{id}', 'App\Http\Controllers\SingleController@supplierdelete');
Route::get('/satuan/delete/{id}', 'App\Http\Controllers\SingleController@satuandelete');
Route::get('/jenis/delete/{id}', 'App\Http\Controllers\SingleController@jenisdelete');
Route::get('/barang/delete/{id}', 'App\Http\Controllers\SingleController@barangdelete');
Route::get('/barangmasuk/delete/{id}', 'App\Http\Controllers\SingleController@barangmasukdelete');
Route::get('/barangkeluar/delete/{id}', 'App\Http\Controllers\SingleController@barangkeluardelete');
});
Route::middleware(['gudang'])->group(function () {
    Route::get('/barangmasuk/add', 'App\Http\Controllers\SingleController@barangmasukinsertview');
    Route::post('/barangmasuk/insert', 'App\Http\Controllers\SingleController@barangmasukinsert');
    Route::post('/barangmasuk/insert2', 'App\Http\Controllers\SingleController@barangmasukinsert2');
    Route::get('/barangmasuk/add/{id}', 'App\Http\Controllers\SingleController@barangmasukinsertviewdua');
    Route::get('/barang/add', 'App\Http\Controllers\SingleController@barangbaranginsertview');
    Route::get('/supplier/add', 'App\Http\Controllers\SingleController@supplierinsertview');
    Route::post('/barang/insert', 'App\Http\Controllers\SingleController@barangbaranginsert');
    Route::post('/barangmasuk/insert', 'App\Http\Controllers\SingleController@barangmasukinsert');
    Route::get('/pengajuanbarangmasuk', 'App\Http\Controllers\SingleController@pengajuanbarangmasukview');
Route::get('/barangkeluar/add', 'App\Http\Controllers\SingleController@barangkeluarinsertview');
Route::post('/barangkeluar/insert', 'App\Http\Controllers\SingleController@barangkeluarinsert');

});
Route::group(['middleware' => ['lurah']], function() {
Route::get('/', 'App\Http\Controllers\SingleController@index');
Route::get('/dashboard', 'App\Http\Controllers\SingleController@index');
Route::get('/supplier', 'App\Http\Controllers\SingleController@supplierview');
Route::get('/satuan', 'App\Http\Controllers\SingleController@barangsatuanview');
Route::get('/jenis', 'App\Http\Controllers\SingleController@barangjenisview');
Route::get('/barang', 'App\Http\Controllers\SingleController@barangbarangview');
Route::get('/barangmasuk', 'App\Http\Controllers\SingleController@barangmasukview');



Route::get('/barangkeluar', 'App\Http\Controllers\SingleController@barangkeluarview');
Route::get('/approvebarangmasuk', 'App\Http\Controllers\SingleController@approvebarangmasukview');
Route::get('/approvebarangkeluar', 'App\Http\Controllers\SingleController@approvebarangkeluarview');

Route::get('/barangmasuk/approve/{id}', 'App\Http\Controllers\SingleController@approvebarangmasukdataview');
Route::get('/barangKeluar/approve/{id}', 'App\Http\Controllers\SingleController@approvebarangkeluardataview');
Route::get('/laporan', 'App\Http\Controllers\SingleController@laporanview');
Route::POST('/laporan/hasil/', 'App\Http\Controllers\SingleController@laporanhasilview');
// edit view
// insert
// insert view
Route::get('/profile', 'App\Http\Controllers\SingleController@profileview');
Route::get('/profile/setting', 'App\Http\Controllers\SingleController@profilesettingview');
Route::get('/profile/ubahpassword', 'App\Http\Controllers\SingleController@profileubahpasswordview');
// update
Route::post('/barangmasuk/approve/update/', 'App\Http\Controllers\SingleController@approvebarangmasukdataupdate');
Route::post('/barangKeluar/approve/update/', 'App\Http\Controllers\SingleController@approvebarangkeluardataupdate');
Route::post('/user/update', 'App\Http\Controllers\SingleController@userupdate');
Route::GET('/user/toggle/{id}', 'App\Http\Controllers\SingleController@usertoggleupdate');
Route::post('/profile/setting/update', 'App\Http\Controllers\SingleController@profileupdate');
//delete
});

