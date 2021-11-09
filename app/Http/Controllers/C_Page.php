<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Project;

class C_Page extends Controller
{
    public function loginPage()
    {
        return view('login.loginPage');
    }
    public function appPage()
    {
        return view('app.main');
    }
    public function berandaPage()
    {
        $dataProject = M_Project::take(7) -> get();
        $totalProject = M_Project::count();
        $dr = ['dataProject' => $dataProject, 'totalProject' => $totalProject];
        return view('app.berandaPage', $dr);
    }
}
