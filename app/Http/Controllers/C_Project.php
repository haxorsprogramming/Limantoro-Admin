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
        $dataPenanggungJawab = M_Profile_Karyawan::where('role_id', 3) -> get();
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
        $project -> alamat = "Medan";
        $project -> selesai = $request -> statusProject;
        $project -> penanggung_jawab = $request -> pj;
        $project -> active = "1";
        $project -> save();
        $dataUnit = $request -> dataUnit;
        $ordinal = 1;
        $orUnit = 0;
        foreach($dataUnit as $unit){
            $sellingPrice = Str::replace(".", "", $dataUnit[$orUnit]['hargaJual']);
            $unit = new M_Data_Unit();
            $unit -> kode = Str::uuid();
            $unit -> nama = $dataUnit[$orUnit]['namaUnit'];
            $unit -> ukuran_tanah = $dataUnit[$orUnit]['ukuranTanah'];
            $unit -> ukuran_bangunan = $dataUnit[$orUnit]['ukuranTanah'];
            $unit -> jumlah_unit = $dataUnit[$orUnit]['jumlahUnit'];
            $unit -> unit_terjual = $dataUnit[$orUnit]['unitTerjual'];
            $unit -> harga_jual = $sellingPrice;
            $unit -> marketing_fee = $dataUnit[$orUnit]['marketingFee'];
            $unit -> kode_project = $request -> kdProject;
            $unit -> user = session('userLogin');
            $unit -> active = "1";
            $unit -> save();
            $ordinal++;
            $orUnit++;
        }
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
    public function detailProject(Request $request, $kdProject)
    {
        $dataProject = M_Project::where('kode', $kdProject) -> first();
        $dr = ['dataProject' => $dataProject];
        return view('app.project.details.detailsProjectPage', $dr);
    }
    public function dataUnitSection(Request $request, $kdProject)
    {
        $dataUnit = M_Data_Unit::where('kode_project', $kdProject) -> get();
        $totalUnit = M_Data_Unit::where('kode_project', $kdProject) -> count();
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