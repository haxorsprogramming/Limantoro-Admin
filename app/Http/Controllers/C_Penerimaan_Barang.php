<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Penerimaan_Barang;
use App\Models\M_Supplier;
use App\Models\M_Pemesanan_Pembelian;

class C_Penerimaan_Barang extends Controller
{
    public function penerimaanBarangPage()
    {
        $noGr = $this -> getNoGr();
        $dataSupplier = M_Supplier::all();
        $dr = ['noGr' => $noGr, 'dataSupplier' => $dataSupplier];
        return view('app.penerimaanBarang.penerimaanBarangPage', $dr);
    }
    public function getPo(Request $request, $kdSup)
    {
        $dataPemesanan = M_Pemesanan_Pembelian::where('kode_supplier', $kdSup) -> get();
        $dr = ['status' => $kdSup, 'dataPemesanan' => $dataPemesanan];
        return \Response::json($dr);
    }
    function getNoGr()
    {
        $totalBk = M_Penerimaan_Barang::count();
        if($totalBk == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "GR-";
            $noPoe = $huruf . sprintf("%07s", $urutan);
            return($noPoe);
        }else{
            $noPoeLast = M_Penerimaan_Barang::orderby('id', 'desc') -> limit(1) -> get();
            $noPoe = $noPoeLast[0] -> no_poe;
            $lastId = substr($noPoe, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "GR-";
            $noPoe = $huruf . sprintf("%07s", $urutan);
            return($noPoe);
        }
    }
}
