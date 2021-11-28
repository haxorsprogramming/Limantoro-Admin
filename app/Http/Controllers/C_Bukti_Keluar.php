<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Bukti_Keluar extends Controller
{
    public function generateBuktiKeluar(Request $request, $noPo)
    {
        return view('app.buktiKeluar.generatePage');
    }
}
