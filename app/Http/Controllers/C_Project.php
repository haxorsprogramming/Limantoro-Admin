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
}
