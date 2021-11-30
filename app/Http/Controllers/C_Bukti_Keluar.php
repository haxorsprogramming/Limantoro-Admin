<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Pemesanan_Pembelian;

class C_Bukti_Keluar extends Controller
{
    public function generateBuktiKeluar(Request $request, $noPo)
    {
        $dataPo = M_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $dr = ['dataPo' => $dataPo];
        return view('app.buktiKeluar.generatePage', $dr);
    }
}
