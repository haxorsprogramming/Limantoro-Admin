<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Auth;

Route::get('/', [C_Page::class, 'loginPage']);
// Route::post('')


// API 
Route::post('/login/proses', [C_Auth::class, 'loginProses']);