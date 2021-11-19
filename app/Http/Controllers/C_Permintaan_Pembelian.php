<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Permintaan_Pembelian extends Controller
{
    public function permintaanPembelianPage()
    {
        return view('app.permintaanPembelian.permintaanPembelianPage');
    }
}
