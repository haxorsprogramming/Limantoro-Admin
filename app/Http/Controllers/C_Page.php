<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Page extends Controller
{
    public function loginPage()
    {
        return view('login.loginPage');
    }
    public function appPage()
    {
        echo "Apps";
    }
}
