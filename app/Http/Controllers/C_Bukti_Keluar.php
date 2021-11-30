<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Pemesanan_Pembelian;
use App\Models\M_Bukti_Keluar;

class C_Bukti_Keluar extends Controller
{
    public function generateBuktiKeluar(Request $request, $noPo)
    {
        $totalBk = M_Bukti_Keluar::count();
        if($totalBk == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "POE-";
            $noPoe = $huruf . sprintf("%07s", $urutan);
        }else{
            $noPoeLast = M_Bukti_Keluar::orderby('id', 'desc') -> limit(1) -> get();
            $noPoe = $noPoeLast[0] -> no_poe;
            $lastId = substr($noPoe, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "POE-";
            $noPoe = $huruf . sprintf("%07s", $urutan);
        }
        $dataPo = M_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $dr = ['dataPo' => $dataPo, 'noPoe' => $noPoe];
        return view('app.buktiKeluar.generatePage', $dr);
    }
}
