<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Penerimaan_Barang extends Controller
{
    public function penerimaanBarangPage()
    {
        return view('app.penerimaanBarang.penerimaanBarangPage');
    }
}
