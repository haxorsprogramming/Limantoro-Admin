<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Project;

class C_Permintaan_Pembelian extends Controller
{
    public function permintaanPembelianPage()
    {
        $dataProject = M_Project::all();
        $dr = ['dataProject' => $dataProject];
        return view('app.permintaanPembelian.permintaanPembelianPage', $dr);
    }
}
