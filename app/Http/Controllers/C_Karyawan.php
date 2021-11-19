<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\M_Karyawan;

class C_Karyawan extends Controller
{
    public function karyawanPage()
    {
        $dataKaryawan = M_Karyawan::all();
        $dr = ['dataKaryawan' => $dataKaryawan];
        return view('app.karyawan.karyawanPage', $dr);   
    }
    public function prosesTambahKaryawan(Request $request)
    {
        // {'username':username, 'nama':nama, 'nik':nik, 'tanggalLahir':tanggalLahir, 'jk':jk, 
            // 'alamat':alamat, 'jabatan':jabatan, 'jenis':jenis, 'bisaLogin':bisaLogin, 'password':password}
        $karyawan = new M_Karyawan();
        $karyawan -> code = $request -> username;
        $karyawan -> admin_code = 'VICKY';
        $karyawan -> id_number = $request -> nik; 
        $karyawan -> name = $request -> nama;
        $karyawan -> photo = "";
        $karyawan -> birth_date = $request -> tanggalLahir;
        $karyawan -> address = $request -> alamat;
        $karyawan -> gender = $request -> jk;
        $karyawan -> role_id = $request -> jabatan;
        $karyawan -> type = $request -> jenis;
        $karyawan -> password = password_hash($request -> password, PASSWORD_DEFAULT);
        $karyawan -> is_active = 1;
        $karyawan -> can_login = 1;
        $karyawan -> save();
        $dr = ['status' => 'sukes'];
        return \Response::json($dr);
    }
}
