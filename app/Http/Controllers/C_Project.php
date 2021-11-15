<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Project;
use App\Models\M_Karyawan;
use App\Models\M_Unit;

class C_Project extends Controller
{
    public function projectPage()
    {
        $dataProject = M_Project::all();
        $dataPenanggungJawab = M_Karyawan::where('role_id', 3) -> get();
        $dr = ['dataProject' => $dataProject, 'dataPenanggungJawab' => $dataPenanggungJawab];
        return view('app.project.projectPage', $dr);
    }
    public function prosesTambahProject(Request $request)
    {
        $project = new M_Project();
        $project -> admin_code = "VICKY";
        $project -> code = $request -> kdProject;
        $project -> name = $request -> namaProject;
        $project -> type = $request -> jenisProject;
        $project -> date = $request -> tanggalProject;
        $project -> address = "Medan barat";
        $project -> is_finished = $request -> statusProject;
        $project -> in_charge_code = $request -> pj;
        $project -> save();

        $dataUnit = $request -> dataUnit;
        $ordinal = 1;
        $orUnit = 0;
        foreach($dataUnit as $unit){
            $sellingPrice = Str::replace(".", "", $dataUnit[$orUnit]['hargaJual']);
            $unit = new M_Unit();
            $unit -> ordinal = $ordinal;
            $unit -> name = $dataUnit[$orUnit]['namaUnit'];
            $unit -> land_size = $dataUnit[$orUnit]['ukuranTanah'];
            $unit -> building_size = $dataUnit[$orUnit]['ukuranTanah'];
            $unit -> builded = $dataUnit[$orUnit]['jumlahUnit'];
            $unit -> sold = $dataUnit[$orUnit]['unitTerjual'];
            $unit -> selling_price = $sellingPrice;
            $unit -> marketing_fee = $dataUnit[$orUnit]['marketingFee'];
            $unit -> project_code = $request -> kdProject;
            $unit -> admin_code = 'VICKY';
            $unit -> save();
            $ordinal++;
            $orUnit++;
        }
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function detailProject()
    {

    }
}