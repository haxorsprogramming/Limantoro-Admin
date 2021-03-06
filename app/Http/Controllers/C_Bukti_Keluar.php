<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Pemesanan_Pembelian;
use App\Models\M_Bukti_Keluar;

use App\Http\Controllers\C_Helper;

class C_Bukti_Keluar extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function buktiKeluarPage()
    {
        $dataBk = M_Bukti_Keluar::all();
        $dr = ['dataBk' => $dataBk];
        return view('app.buktiKeluar.buktiKeluarPage', $dr);
    }
    public function generateBuktiKeluar(Request $request, $noPo)
    {
        $noPoe = $this -> getNoPoe();
        $dataPo = M_Pemesanan_Pembelian::where('no_po', $noPo) -> get();
        $noPo = $dataPo[0] -> no_po;
        $dr = ['dataPo' => $dataPo, 'noPoe' => $noPoe, 'noPo' => $noPo];
        return view('app.buktiKeluar.generatePage', $dr);
    }
    public function generateProses(Request $request)
    {
        $dataUser = $this -> helperCtr -> getUserData();
        $noPoe = $this -> getNoPoe();
        $bk = new M_Bukti_Keluar();
        $bk -> token = Str::uuid();
        $bk -> user_request = $dataUser -> username;
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
        // update pemesanan pembelian 
        $noPo = $request -> noPo;
        M_Pemesanan_Pembelian::where('no_po', $noPo) -> update([
            'no_poe' => $noPoe
        ]);
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
