<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Project;

class C_Project extends Controller
{
    public function projectPage()
    {
        $dataProject = M_Project::all();
        $dr = ['dataProject' => $dataProject];
        return view('app.project.projectPage', $dr);
    }
}
