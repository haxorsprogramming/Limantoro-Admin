<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Supplier;

Route::get('/', [C_Page::class, 'loginPage']);
// Route::post('')
Route::get('/app', [C_Page::class, 'appPage']);
Route::get('/app/beranda', [C_Page::class, 'berandaPage']);
Route::get('/app/supplier', [C_Supplier::class, 'supplierPage']);
// API 
Route::post('/login/proses', [C_Auth::class, 'loginProses']);