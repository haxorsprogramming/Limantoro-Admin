<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\M_Permintaan_Pembelian;
use App\Models\M_Item_Permintaan_Pembelian;
use App\Models\M_Project;

use PDF;

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
        $dataItem = M_Item_Permintaan_Pembelian::where('no_pr', $noPr) -> get();
        $dr = ['dataItem' => $dataItem, 'noPr' => $noPr];
        return view('app.persetujuanPermintaanPembelian.permintaanMaterial', $dr);
    }
    public function prosesPersetujuan(Request $request)
    {
        // {'noPr':noPr, 'dataQt':dBantuan.dataQt} 
        // update status permintaan pembelian
        M_Permintaan_Pembelian::where('no_pr', $request -> noPr) -> update([
            'status' => 'approved',
            'user_approve' => session('userLogin')
        ]);
        // update item permintaan pembelian 
        $j = 0;
        $dataQt = $request -> dataQt;
        foreach($dataQt as $dq){
            M_Item_Permintaan_Pembelian::where('no_pr', $request -> noPr) -> where('kode_material', $dataQt[$j]['kode']) -> update([
                'qt_approve' => $dataQt[$j]['qt'],
                'status' => 'approved'
            ]);
            $j++;
        }
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function cetakPersetujuan(Request $request, $noPr)
    {
        $judul = "Persetujuan Permintaan Pembelian";
        $dataPermintaan = M_Permintaan_Pembelian::where('no_pr', $noPr) -> first();
        $approver = $dataPermintaan -> user_approve;
        $kdProject = $dataPermintaan -> kode_project;
        $dataProject = M_Project::where('kode', $kdProject) -> first();
        $userProfile = $dataPermintaan -> userProfileData;
        $dataItem = M_Item_Permintaan_Pembelian::where('no_pr', $noPr) -> get();
        $dr = [
            'judul' => $judul,
            'dataItem' => $dataItem,
            'userProfile' => $userProfile,
            'dataProject' => $dataProject,
            'noPr' => $noPr,
            'approver' => $approver
        ];
        $pdf = PDF::loadview('app.persetujuanPermintaanPembelian.cetakPersetujuan', $dr);
        $pdf -> setPaper('A4', 'landscape');
        return $pdf -> stream();
    }
}
