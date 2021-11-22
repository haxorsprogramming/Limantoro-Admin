<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Project;
use App\Models\M_Material;
use App\Models\M_Permintaan_Pembelian;

class C_Permintaan_Pembelian extends Controller
{
    public function permintaanPembelianPage()
    {
        $dataProject = M_Project::all();
        $dataMaterial = M_Material::all();
        $totalPermintaanPembelian = M_Permintaan_Pembelian::count();
        
        if($totalPermintaanPembelian == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "PR-";
            $noPr = $huruf . sprintf("%07s", $urutan);
        }else{
            $prTerakhir = M_Permintaan_Pembelian::orderby('id', 'desc') -> limit(1) -> get();
            $noPr = $prTerakhir[0] -> no_pr;
            $lastId = substr($noPr, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "PR-";
            $noPr = $huruf . sprintf("%07s", $urutan);
        }
        $dr = ['dataProject' => $dataProject, 'dataMaterial' => $dataMaterial, 'noPr' => $noPr];
        return view('app.permintaanPembelian.permintaanPembelianPage', $dr);
    }
}
