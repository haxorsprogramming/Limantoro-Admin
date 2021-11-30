<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Pengembalian_Barang;
use App\Models\M_Supplier;
use App\Models\M_Item_Pemesanan_Pembelian;

class C_Pengembalian_Barang extends Controller
{
    public function pengembalianBarangPage()
    {
        $noGrn = $this -> getNoGrn();
        $dataSupplier = M_Supplier::all();
        $dr = ['noGrn' => $noGrn, 'dataSupplier' => $dataSupplier];
        return view('app.pengembalianBarang.pengembalianBarangPage', $dr);
    }
    public function getMaterial(Request $request, $noPo)
    {
        $dataItemMaterial = M_Item_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $dr = ['dataItemMaterial' => $dataItemMaterial];
        return view('app.pengembalianBarang.materialData', $dr);
    }
    function getNoGrn()
    {
        $totalBk = M_Pengembalian_Barang::count();
        if($totalBk == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "GRN-";
            $noGrn = $huruf . sprintf("%07s", $urutan);
            return($noGrn);
        }else{
            $noGrnLast = M_Pengembalian_Barang::orderby('id', 'desc') -> limit(1) -> get();
            $noGrn = $noGrnLast[0] -> no_grn;
            $lastId = substr($noGrn, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "GRN-";
            $noGrn = $huruf . sprintf("%07s", $urutan);
            return($noGrn);
        }
    }
}
