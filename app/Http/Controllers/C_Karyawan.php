<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Karyawan;

class C_Karyawan extends Controller
{
    public function karyawanPage()
    {
        $dataKaryawan = M_Karyawan::all();
        $dr = ['dataKaryawan' => $dataKaryawan];
        return view('app.karyawan.karyawanPage');   
    }
}
