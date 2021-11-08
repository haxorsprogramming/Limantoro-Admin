<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Auth;

Route::get('/', [C_Page::class, 'loginPage']);
// Route::post('')
Route::get('/app', [C_Page::class, 'appPage']);

// API 
Route::post('/login/proses', [C_Auth::class, 'loginProses']);