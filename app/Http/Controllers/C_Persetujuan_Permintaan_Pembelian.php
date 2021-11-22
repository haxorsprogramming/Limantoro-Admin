<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\M_Permintaan_Pembelian;
use App\Models\M_Item_Permintaan_Pembelian;

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
        $dataPermintaan = M_Permintaan_Pembelian::where('no_pr', $noPr) -> first();
        $namaProject = $dataPermintaan -> projectData -> nama;
        $dr = ['status' => 'sukses', 'dp' => $dataPermintaan, 'namaProject' => $namaProject];
        return \Response::json($dr);
    }
    public function tabelPermintaanMaterial(Request $request, $noPr)
    {
        $dataItem = M_Item_Permintaan_Pembelian::where('no_pr', $noPr)->get();
        $dr = ['dataItem' => $dataItem];
        return view('app.persetujuanPermintaanPembelian.permintaanMaterial', $dr);
    }
}
