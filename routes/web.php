<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Supplier;
use App\Http\Controllers\C_Customer;
use App\Http\Controllers\C_Material;

Route::get('/', [C_Page::class, 'loginPage']);
Route::get('/auth/logout', [C_Auth::class, 'logout']);
// Route::post('')
Route::get('/app', [C_Page::class, 'appPage']);
Route::get('/app/beranda', [C_Page::class, 'berandaPage']);
// supplier 
Route::get('/app/supplier', [C_Supplier::class, 'supplierPage']);
Route::get('/app/supplier/datatable', [C_Supplier::class, 'jsonDatatable']);
Route::post('/app/supplier/tambah/proses', [C_Supplier::class, 'prosesTambahSupplier']);
Route::get('/app/supplier/{codeSupplier}/edit/data', [C_Supplier::class, 'editDataSupplier']);
Route::post('/app/supplier/edit/proses', [C_Supplier::class, 'prosesUpdateSupplier']);
Route::post('/app/supplier/delete/proses', [C_Supplier::class, 'prosesDeleteSupplier']);
// customer 
Route::get('/app/customer', [C_Customer::class, 'customerPage']);
// material 
Route::get('app/material', [C_Material::class, 'materialPage']);
Route::post('/app/material/tambah/proses', [C_Material::class, 'prosesTambahMaterial']);
Route::get('/app/material/{codeMaterial}/edit/data', [C_Material::class, 'editDataMaterial']);
// API 
Route::post('/login/proses', [C_Auth::class, 'loginProses']);