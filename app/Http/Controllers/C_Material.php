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
    public function prosesTambahMaterial(Request $request)
    {
        // {'kdMaterial':kdMaterial, 'namaMaterial':namaMaterial, 'satuan':satuan}
        $material = new M_Material();
        $material -> kode = $request -> kdMaterial;
        $material -> nama = $request -> namaMaterial;
        $material -> satuan = $request -> satuan;
        $material -> jumlah = 0;
        $material -> user = session('userLogin');
        $material -> active = "1";
        $material -> save();
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function editDataMaterial(Request $request, $codeMaterial)
    {
        $dataMaterial = M_Material::where('kode', $codeMaterial) -> first();
        $dr = ['dataMaterial' => $dataMaterial];
        return \Response::json($dr);
    }
    public function prosesUpdateMaterial(Request $request)
    {
        // {'kdMaterial':kdMaterial, 'namaMaterial':namaMaterial, 'satuan':satuan}
        $kdMaterial = $request -> kdMaterial;
        M_Material::where('kode', $kdMaterial) -> update([
            'nama' => $request -> namaMaterial,
            'satuan' => $request -> satuan
        ]);
        $dr = ['dataMaterial' => 'halo'];
        return \Response::json($dr);
    }
}
