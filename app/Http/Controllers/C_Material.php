<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Material;

class C_Material extends Controller
{
    public function materialPage()
    {
        $dataMaterial = M_Material::all();
        $dr = ['dataMaterial' => $dataMaterial];
        return view('app.material.materialPage', $dr);
    }
}
