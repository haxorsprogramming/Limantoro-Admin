<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Pengembalian_Pembelian extends Controller
{
    public function pengembalianPembelianPage()
    {
        return view('app.pengembalianPembelian.pengembalianPembelianPage');
    }
}
