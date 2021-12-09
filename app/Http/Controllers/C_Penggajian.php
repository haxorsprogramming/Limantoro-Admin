<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\IndonesiaPayrollCalculator\PayrollCalculator;

class C_Penggajian extends Controller
{
    public function datakaryawan()
    {
        return view('app.penggajian.dataKaryawanPage');
    }

    public function test()
    {
        
    }
    
}
