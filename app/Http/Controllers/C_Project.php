<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Project;
use App\Models\M_Profile_Karyawan;
use App\Models\M_Data_Unit;

class C_Project extends Controller
{
    public function projectPage()
    {
        $dataProject = M_Project::all();
        $dataPenanggungJawab = M_Profile_Karyawan::where('role_id', 2) -> get();
        $dr = ['dataProject' => $dataProject, 'dataPenanggungJawab' => $dataPenanggungJawab];
        return view('app.project.projectPage', $dr);
    }
    public function prosesTambahProject(Request $request)
    {
        $project = new M_Project();
        $project -> user = session('userLogin');
        $project -> kode = $request -> kdProject;
        $project -> nama = $request -> namaProject;
        $project -> deksripsi = "-";
        $project -> tipe = $request -> jenisProject;
        $project -> tanggal = $request -> tanggalProject;
        $project -> address = "Medan";
        $project -> selesai = $request -> statusProject;
        $project -> penanggung_jawab = $request -> pj;
        $project -> save();

        $dataUnit = $request -> dataUnit;
        $ordinal = 1;
        $orUnit = 0;
        foreach($dataUnit as $unit){
            $sellingPrice = Str::replace(".", "", $dataUnit[$orUnit]['hargaJual']);
            $unit = new M_Data_Unit();
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
    public function detailProject(Request $request, $kdProject)
    {
        $dataProject = M_Project::where('code', $kdProject) -> first();
        $dr = ['dataProject' => $dataProject];
        return view('app.project.details.detailsProjectPage', $dr);
    }
    public function dataUnitSection(Request $request, $kdProject)
    {
        $dataUnit = M_Unit::where('project_code', $kdProject) -> get();
        $totalUnit = M_Unit::where('project_code', $kdProject) -> count();
        $dr = ['dataUnit' => $dataUnit, 'totalUnit' => $totalUnit];
        return view('app.project.details.secDataUnit', $dr);
    }
    public function materialDariStock(Request $request, $kdProject)
    {
        echo "Material dari stock ".$kdProject;
    }
    public function materialTersisa(Request $request, $kdProject)
    {
        echo "material tersisa ".$kdProject;
    }
}