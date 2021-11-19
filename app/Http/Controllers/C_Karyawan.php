<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Profile_Karyawan;

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
        $karyawan = new M_Profile_Karyawan();
        $karyawan -> username = $request -> username;
        $karyawan -> admin_code = session('userLogin');
        $karyawan -> nik = $request -> nik; 
        $karyawan -> nama = $request -> nama;
        $karyawan -> tanggal_lahir = $request -> tanggalLahir;
        $karyawan -> alamat = $request -> alamat;
        $karyawan -> jenis_kelamin = $request -> jk;
        $karyawan -> role_id = $request -> jabatan;
        $karyawan -> tipe = $request -> jenis;
        $karyawan -> password = password_hash($request -> password, PASSWORD_DEFAULT);
        $karyawan -> active = "1";
        $karyawan -> bisa_login = "1";
        $karyawan -> save();
        $dr = ['status' => 'sukes'];
        return \Response::json($dr);
    }
}
