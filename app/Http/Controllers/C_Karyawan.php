<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\M_Profile_Karyawan;
use App\Models\M_User;
use App\Models\M_Penggajian_Data_Set;

use App\Http\Controllers\C_Helper;

class C_Karyawan extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function karyawanPage()
    {
        $dataKaryawan = M_Profile_Karyawan::where('active', 1) -> get();
        $dr = ['dataKaryawan' => $dataKaryawan];
        return view('app.karyawan.karyawanPage', $dr);   
    }
    public function prosesTambahKaryawan(Request $request)
    {
        $dataUser = $this -> helperCtr -> getUserData();
        // {'username':username, 'nama':nama, 'nik':nik, 'tanggalLahir':tanggalLahir, 'jk':jk, 
            // 'alamat':alamat, 'jabatan':jabatan, 'jenis':jenis, 'bisaLogin':bisaLogin, 'password':password}
            // 'email':email, 'hp':hp,'foto':foto
        // save user data 
        $user = new M_User();
        $user -> username = $request -> username;
        $user -> role = $request -> jabatan;
        $user -> password = password_hash($request -> password, PASSWORD_DEFAULT);
        $user -> api_token = "-";
        $user -> username_parent = $dataUser -> username;
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
        $karyawan -> email = $request -> email;
        $karyawan -> no_hp = $request -> hp;
        $karyawan -> active = "1";
        $karyawan -> save();
        // create data penggajian 
        $pg = new M_Penggajian_Data_Set();
        $pg -> username = $request -> username;
        $pg -> total_gaji = "0";
        $pg -> active = "1";
        $pg -> save();
        // upload foto profile 
        $imgVaArr1 = explode(";", $request -> foto);
        $imgData1 = explode(",", $imgVaArr1[1]);
        $data_var1 = base64_decode($imgData1[1]);
        $namaVariantPic1 = $request -> username.".png";
        file_put_contents('file/user_pic/'.$namaVariantPic1, $data_var1);
        $dr = ['status' => 'sukes'];
        return \Response::json($dr);
    }

    public function prosesHapusKaryawan(Request $request)
    {
        $username = $request -> username;
        M_Profile_Karyawan::where('username', $username) -> delete();
        M_User::where('username', $username) -> delete();
        $dr = ['status' => 'sukes'];
        return \Response::json($dr);
    }

}
