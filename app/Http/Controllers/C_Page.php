<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\M_Project;
use App\Models\M_User;
use App\Models\M_Role;

use App\Http\Controllers\C_Helper;

class C_Page extends Controller
{

    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function loginPage(Request $request)
    {
        return view('login.loginPage');
    }
    public function appPage()
    {
        
        $getDataUser = $this -> helperCtr -> getUserData();
        dd($getDataUser);
        // $userLogin = session('userLogin');
        // $dataUser = M_User::where('username', $userLogin) -> first();
        // $dataRole = M_Role::where('kode', $dataUser -> role) -> first();
        // $dr = ['dataRole' => $dataRole];
        // return view('app.main', $dr);
    }
    public function berandaPage()
    {
        $dataProject = M_Project::take(7) -> get();
        $totalProject = M_Project::count();
        $dr = ['dataProject' => $dataProject, 'totalProject' => $totalProject];
        return view('app.berandaPage', $dr);
    }
    public function tesJwt()
    {
        $key = env('JWT_KEY');
        $payload = array(
            "iss" => "admin",
            "username" => "diana"
        );
        $jwt = JWT::encode($payload, $key, 'HS256');
        setcookie("KACTUS_LIMANTORO_TOKEN", $jwt);
        echo ($jwt);
        // $decoded = JWT::decode($jwt, new Key($key, 'HS256'));

        // return \Response::json($decoded);
    }
}
