<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Supplier;
use App\Models\M_Permintaan_Pembelian;

class C_Pemesanan_Pembelian extends Controller
{
    public function pemesananPembelianPage()
    {
        $dataSupplier = M_Supplier::all();
        $dataPermintaanPembelian = M_Permintaan_Pembelian::where('status', 'not_approve') -> get();
        $dr = ['dataSupplier' => $dataSupplier, 'dataPermintaanPembelian' => $dataPermintaanPembelian];
        return view('app.pemesananPembelian.pemesananPembelianPage', $dr);
    }
}
