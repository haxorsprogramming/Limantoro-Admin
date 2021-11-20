<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Project;
use App\Models\M_Material;

class C_Permintaan_Pembelian extends Controller
{
    public function permintaanPembelianPage()
    {
        $dataProject = M_Project::all();
        $dataMaterial = M_Material::all();
        $dr = ['dataProject' => $dataProject, 'dataMaterial' => $dataMaterial];
        return view('app.permintaanPembelian.permintaanPembelianPage', $dr);
    }
}
