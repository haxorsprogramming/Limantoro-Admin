<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Supplier;

Route::get('/', [C_Page::class, 'loginPage']);
// Route::post('')
Route::get('/app', [C_Page::class, 'appPage']);
Route::get('/app/beranda', [C_Page::class, 'berandaPage']);
// supplier 
Route::get('/app/supplier', [C_Supplier::class, 'supplierPage']);
Route::get('/app/supplier/datatable', [C_Supplier::class, 'jsonDatatable']);
Route::post('/app/supplier/tambah/proses', [C_Supplier::class, 'prosesTambahSupplier']);
// API 
Route::post('/login/proses', [C_Auth::class, 'loginProses']);