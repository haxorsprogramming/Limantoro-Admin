<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Pemesanan_Pembelian;
use App\Models\M_Bukti_Keluar;

class C_Bukti_Keluar extends Controller
{
    public function generateBuktiKeluar(Request $request, $noPo)
    {
        $noPoe = $this -> getNoPoe();
        $dataPo = M_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $dr = ['dataPo' => $dataPo, 'noPoe' => $noPoe];
        return view('app.buktiKeluar.generatePage', $dr);
    }
    public function generateProses(Request $request)
    {
        // 'noPoe':noPoe, 'tanggal':tanggal, 'dibayar':dibayar, 'tanggalDibayar':tanggalDibayar, 'note':note, 'nmBank1':nmBank1, 'nmBank2':nmBank2,
        //         'accBank1' : accBank1, 'accBank2':accBank2, 'tBank1':tBank1, 'tBank2':tBank2, 'disc':disc
        // save bukti keluar 
        $noPoe = $this -> getNoPoe();
        $bk = new M_Bukti_Keluar();
        $bk -> token = Str::uuid();
        $bk -> user_request = session('userLogin');
        $bk -> no_poe = $noPoe;
        $bk -> tanggal = $request -> tanggal;
        $bk -> is_paid = $request -> dibayar;
        $bk -> tanggal_dibayar = $request -> tanggalDibayar;
        $bk -> note = $request -> note;
        $bk -> bank_1 = $request -> nmBank1;
        $bk -> no_bank_1 = $request -> accBank1;
        $bk -> total_1 = $request -> tBank1;
        $bk -> bank_2 = $request -> nmBank2;
        $bk -> no_bank_2 = $request -> accBank2;
        $bk -> total_2 = $request -> tBank2;
        $bk -> discount = $request -> disc;
        $bk -> active = "1";
        $bk -> save();
        $dr = ['status' => $noPoe];
        return \Response::json($dr);
    }

    public function getNoPoe()
    {
        $totalBk = M_Bukti_Keluar::count();
        if($totalBk == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "POE-";
            $noPoe = $huruf . sprintf("%07s", $urutan);
            return($noPoe);
        }else{
            $noPoeLast = M_Bukti_Keluar::orderby('id', 'desc') -> limit(1) -> get();
            $noPoe = $noPoeLast[0] -> no_poe;
            $lastId = substr($noPoe, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "POE-";
            $noPoe = $huruf . sprintf("%07s", $urutan);
            return($noPoe);
        }
    }

}
