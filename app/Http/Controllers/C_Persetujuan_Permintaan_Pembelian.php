<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\M_Permintaan_Pembelian;

class C_Persetujuan_Permintaan_Pembelian extends Controller
{
    public function persetujuanPermintaanPembelianPage()
    {
        $dataPermintaan = M_Permintaan_Pembelian::all();
        $dr = ['dataPermintaan' => $dataPermintaan];
        return view('app.persetujuanPermintaanPembelian.persetujuanPermintaanPembelianPage', $dr);
    }
    public function dataForModal(Request $request, $noPr)
    {
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
