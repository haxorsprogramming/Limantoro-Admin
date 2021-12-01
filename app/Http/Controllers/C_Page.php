<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

use App\Models\M_Project;
use App\Models\M_User;
use App\Models\M_Role;
use App\Models\M_Penerimaan_Barang;

use App\Http\Controllers\C_Helper;
use App\Models\M_Pengembalian_Barang;
use App\Models\M_Permintaan_Pembelian;

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
        
        $userData = $this -> helperCtr -> getUserData();
        $username = $userData -> username;
        $role = $userData -> role;
        $capsRole = $this -> helperCtr -> convertRole($role);
        $dr = ['role' => $role, 'username' => $username, 'caps' => $capsRole];
        return view('app.main', $dr);
    }
    public function berandaPage()
    {
        $dataProject = M_Project::take(7) -> get();
        $totalProject = M_Project::count();
        $totalPenerimaanBarang = M_Penerimaan_Barang::count();
        $totalPermintaanPembelian = M_Permintaan_Pembelian::count();
        $totalPengembalianBarang = M_Pengembalian_Barang::count();
        $dr = [
            'dataProject' => $dataProject,
            'totalProject' => $totalProject,
            'totalPenerimaanBarang' => $totalPenerimaanBarang,
            'totalPermintaanPembelian' => $totalPermintaanPembelian,
            'pengembalianBarang' => $totalPengembalianBarang
        ];
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
