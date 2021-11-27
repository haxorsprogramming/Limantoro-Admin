<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Supplier;
use App\Models\M_Permintaan_Pembelian;
use App\Models\M_Pemesanan_Pembelian;
use App\Models\M_Item_Permintaan_Pembelian;
use App\Models\M_Item_Pemesanan_Pembelian;

class C_Pemesanan_Pembelian extends Controller
{
    public function pemesananPembelianPage()
    {
        $dataSupplier = M_Supplier::all();
        $dataPermintaanPembelian = M_Permintaan_Pembelian::where('status', 'approved') -> get();
        $totalPesananPembelian = M_Pemesanan_Pembelian::count();

        if($totalPesananPembelian == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }else{
            $noPoLast = M_Pemesanan_Pembelian::orderby('id', 'desc') -> limit(1) -> get();
            $noPo = $noPoLast -> no_po;
            $lastId = substr($noPo, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }
        $dr = ['dataSupplier' => $dataSupplier, 'dataPermintaanPembelian' => $dataPermintaanPembelian, 'noPo' => $noPo];
        return view('app.pemesananPembelian.pemesananPembelianPage', $dr);
    }
    public function getMaterialData(Request $request)
    {
        // cari material data 
        $dataMaterial = M_Item_Permintaan_Pembelian::where('no_pr', $request -> noPr) -> get();
        foreach($dataMaterial as $dm){
            $arrTemp['id'] = $dm['id'];
            $arrTemp['kode_material'] = $dm['kode_material'];
            $arrTemp['qt'] = $dm['qt'];
            $arrTemp['qt_approve'] = $dm['qt_approve'];
            $arrTemp['nama_material'] = $dm['materialData']['nama'];
            $arrTemp['satuan'] = $dm['materialData']['satuan'];
            $dr['dataMaterial'][] = $arrTemp;
        }
        // $dr = ['status' => $noPr];
        return \Response::json($dr);
    }
    public function prosesPemesananPembelian(Request $request)
    {
        // {'tanggal':tanggal, 'noPr':noPr, 'kdSupplier':kdSupplier, 'material':material}
        $totalPesananPembelian = M_Pemesanan_Pembelian::count();
        if($totalPesananPembelian == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }else{
            $noPoLast = M_Pemesanan_Pembelian::orderby('id', 'desc') -> limit(1) -> get();
            $noPo = $noPoLast -> no_po;
            $lastId = substr($noPo, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }
        // save data pemesanan pembelian 
        $pemesanan = new M_Pemesanan_Pembelian();
        $pemesanan -> token = Str::uuid();
        $pemesanan -> no_po = $noPo;
        $pemesanan -> tanggal = $request -> tanggal;
        $pemesanan -> no_pr = $request -> noPr;
        $pemesanan -> kode_supplier = $request -> kdSupplier;
        $pemesanan -> no_poy = "-";
        $pemesanan -> user_lock = "-";
        $pemesanan -> user_approve = session('userLogin');
        $pemesanan -> no_poe = "-";
        $pemesanan -> active = "1";
        $pemesanan -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
