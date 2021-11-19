<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Profile_Karyawan;
use App\Models\M_User;

class C_Karyawan extends Controller
{
    public function karyawanPage()
    {
        $dataKaryawan = M_Profile_Karyawan::where('active', 1) -> get();
        $dr = ['dataKaryawan' => $dataKaryawan];
        return view('app.karyawan.karyawanPage', $dr);   
    }
    public function prosesTambahKaryawan(Request $request)
    {
        // {'username':username, 'nama':nama, 'nik':nik, 'tanggalLahir':tanggalLahir, 'jk':jk, 
            // 'alamat':alamat, 'jabatan':jabatan, 'jenis':jenis, 'bisaLogin':bisaLogin, 'password':password}
        // save user data 
        $user = new M_User();
        $user -> username = $request -> username;
        $user -> role = $request -> jabatan;
        $user -> password = password_hash($request -> password, PASSWORD_DEFAULT);
        $user -> api_token = "-";
        $user -> username_parent = session('userLogin');
        $user -> active = "1";
        $user -> save();
        // save profile user data 
        $karyawan = new M_Profile_Karyawan();
        $karyawan -> username = $request -> username;
        $karyawan -> role_id = $request -> jabatan;
        $karyawan -> nama_lengkap = $request -> nama;
        $karyawan -> nik = $request -> nik; 
        $karyawan -> tanggal_lahir = $request -> tanggalLahir;
        $karyawan -> alamat = $request -> alamat;
        $karyawan -> jenis_kelamin = $request -> jk;
        $karyawan -> tipe = $request -> jenis;
        $karyawan -> bisa_login = "1";
        $karyawan -> active = "1";
        $karyawan -> save();

        $dr = ['status' => 'sukes'];
        return \Response::json($dr);
    }
}
