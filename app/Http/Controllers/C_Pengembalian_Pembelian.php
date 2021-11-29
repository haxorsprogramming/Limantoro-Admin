<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Pengembalian_Pembelian extends Controller
{
    public function pengembalianPembelianPage()
    {
        $dataSupplier = M_Supplier::all();
        $dataPermintaanPembelian = M_Permintaan_Pembelian::where('status', 'approved') -> get();
        $totalPesananPembelian = M_Pemesanan_Pembelian::count();
        $dataPemesananPembelian = M_Pemesanan_Pembelian::get();

        if($totalPesananPembelian == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }else{
            $noPoLast = M_Pemesanan_Pembelian::orderby('id', 'desc') -> limit(1) -> get();
            $noPo = $noPoLast[0] -> no_po;
            $lastId = substr($noPo, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }
        $dr = [
            'dataSupplier' => $dataSupplier,
            'dataPermintaanPembelian' => $dataPermintaanPembelian,
            'noPo' => $noPo,
            'dataPemesananPembelian' => $dataPemesananPembelian
        ];
        return view('app.pemesananPembelian.pemesananPembelianPage', $dr);
    }
}
