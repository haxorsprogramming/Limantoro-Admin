<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Project;
use App\Models\M_Karyawan;

class C_Project extends Controller
{
    public function projectPage()
    {
        $dataProject = M_Project::all();
        $dataPenanggungJawab = M_Karyawan::where('role_id', 3) -> get();
        // dd($dataPenanggungJawab);
        $dr = ['dataProject' => $dataProject, 'dataPenanggungJawab' => $dataPenanggungJawab];
        return view('app.project.projectPage', $dr);
    }
    public function prosesTambahProject(Request $request)
    {
        // {'kdProject':kdProject, 'namaProject':namaProject, 'pj':pj,
            //  'jenisProject':jenisProject, 'tanggalProject':tanggalProject,
            //  'statusProject':statusProject}
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

        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}