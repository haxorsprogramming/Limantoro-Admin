<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\IndonesiaPayrollCalculator\PayrollCalculator;

use App\Models\M_Profile_Karyawan;

class C_Penggajian extends Controller
{
    public function datakaryawan()
    {
        $datakaryawan = M_Profile_Karyawan::all();
        $dr = ['dataKaryawan' => $datakaryawan];
        return view('app.penggajian.dataKaryawanPage', $dr);
    }

    public function test()
    {
        
    }
    
}
