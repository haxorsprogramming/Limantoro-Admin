<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Project;
use App\Models\M_Material;
use App\Models\M_Permintaan_Pembelian;
use App\Models\M_Item_Permintaan_Pembelian;

use PDF;

class C_Permintaan_Pembelian extends Controller
{
    public function permintaanPembelianPage()
    {
        $dataProject = M_Project::all();
        $dataMaterial = M_Material::all();
        $totalPermintaanPembelian = M_Permintaan_Pembelian::count();
        $dataPermintaan = M_Permintaan_Pembelian::all();
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
        $dr = ['dataProject' => $dataProject, 'dataMaterial' => $dataMaterial, 'noPr' => $noPr, 'dataPermintaan' => $dataPermintaan];
        return view('app.permintaanPembelian.permintaanPembelianPage', $dr);
    }
    public function prosesPermintaanPembelian(Request $request)
    {
        // {'dataMaterial':appPermintaan.materialData, 'kdProject':kdProject, 'tanggal':tanggal}
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
        // simpan data permintaan pembelian 
        $pb = new M_Permintaan_Pembelian();
        $pb -> kode = Str::uuid();
        $pb -> tanggal = $request -> tanggal;
        $pb -> no_pr = $noPr;
        $pb -> kode_project = $request -> kdProject;
        $pb -> user_request = session('userLogin');
        $pb -> user_approve = "-";
        $pb -> status = "not_approve";
        $pb -> active = "1";
        $pb -> save();
        // simpan item pembelian
        $orMaterial = 0;
        $dataMaterial = $request -> dataMaterial;
        foreach($dataMaterial as $m){
            $ip = new M_Item_Permintaan_Pembelian();
            $ip -> no_pr = $noPr;
            $ip -> kode_project = $request -> kdProject;
            $ip -> kode_material = $dataMaterial[$orMaterial]['kode'];
            $ip -> pesan = $dataMaterial[$orMaterial]['pesan'];
            $ip -> qt = $dataMaterial[$orMaterial]['jumlah'];
            $ip -> qt_approve = 0;
            $ip -> status = "not_approve";
            $ip -> active = "1";
            $ip -> save();
            $orMaterial++;
        }
        $dr = ['status' => 'genggam'];
        return \Response::json($dr);
    }
    public function cetakPermintaan(Request $request, $noPr)
    {
        $dataPermintaan = M_Permintaan_Pembelian::where('no_pr', $noPr) -> first();
        $userProfile = $dataPermintaan -> userProfileData;
        $dataItem = M_Item_Permintaan_Pembelian::where('no_pr', $noPr) -> get();
        $dr = ['dataItem' => $dataItem, 'noPr' => $noPr, 'userProfile' => $userProfile];
        $pdf = PDF::loadview('app.permintaanPembelian.cetakPermintaan', $dr);
        $pdf -> setPaper('A4', 'landscape');
        return $pdf -> stream();
    }
}
