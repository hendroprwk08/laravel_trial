<?php

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

//----- C U S T O M E R ----------

Route::get('customer', 'Customer@index');

Route::get('customer/form', 'Customer@form');

Route::post('customer/simpan', 'Customer@simpan');

Route::get('customer/pilih/{id}', 'Customer@pilih');

Route::get('customer/hapus/{id}', 'Customer@hapus');

Route::post('customer/perbarui', 'Customer@perbarui');


//----- S U P P L I E R ----------

Route::get('supplier', 'Supplier@index');

Route::get('supplier/form', 'Supplier@form');

Route::post('supplier/simpan', 'Supplier@simpan');

Route::get('supplier/pilih/{id}', 'Supplier@pilih');

Route::get('supplier/hapus/{id}', 'Supplier@hapus');

Route::post('supplier/perbarui', 'Supplier@perbarui');


//----- B A R A N G ----------

Route::get('barang', 'Barang@index');

Route::get('barang/form', 'Barang@form');

Route::post('barang/simpan', 'Barang@simpan');

Route::get('barang/pilih/{id}', 'Barang@pilih');

Route::get('barang/hapus/{id}', 'Barang@hapus');

Route::post('barang/perbarui', 'Barang@perbarui');