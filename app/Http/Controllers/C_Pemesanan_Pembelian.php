<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Pemesanan_Pembelian extends Controller
{
    public function pemesananPembelianPage()
    {
        return view('app.pemesananPembelian.pemesananPembelianPage');
    }
}
