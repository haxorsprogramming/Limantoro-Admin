<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use PDF;

use App\Models\M_Profile_Karyawan;
use App\Models\M_Penggajian_Data_Set;
use App\Models\M_Payroll_Enroll;

use App\Http\Controllers\C_Helper;
class C_Penggajian extends Controller
{
    protected $helperCtr;

    public function __construct(C_Helper $helperCtr)
    {
        $this -> helperCtr = $helperCtr;
    }

    public function datakaryawan()
    {
        $dataKaryawan = M_Penggajian_Data_Set::all();
        $dr = ['dataKaryawan' => $dataKaryawan];
        return view('app.penggajian.dataKaryawanPage', $dr);
    }

    public function setDataPenggajian(Request $request, $username)
    {
        $dataKaryawan = M_Penggajian_Data_Set::where('username', $username) -> first();
        $dr = ['dataKaryawan' => $dataKaryawan];
        return view('app.penggajian.editDataPenggajianPage', $dr);
    }

    public function prosesDataPenggajian(Request $request)
    {
        $username = $request -> username;
        M_Penggajian_Data_Set::where('username', $username) -> update([
            'status_menikah' => $request -> statusKawin,
            'jumlah_tanggungan' => $request -> jumlahTanggungan,
            'gaji_pokok' => $request -> gajiPokok,
            'tunjangan_tetap' => $request -> tunjanganTetap,
            'tunjangan_makan' => $request -> tunjanganMakan,
            'lembur' => $request -> lembur,
            'absent' => $request -> absent,
            'split_shift' => $request -> splitShift,
            'kasbon' => $request -> kasbon,
            'active' => '1',
            'hari_kerja' => $request -> hariKerja
        ]);
        $dr = ['status' => 'sukses', 'username' => $username];
        return \Response::json($dr);
    }
    public function payrollSet(Request $request, $username)
    {
        $dataKaryawan = M_Penggajian_Data_Set::where('username', $username) -> first();
        $hasilPerhitungan = $this -> helperCtr -> payroll($dataKaryawan, $username);
        $dr = ['dataKaryawan' => $dataKaryawan, 'hp' => $hasilPerhitungan];
        return view('app.penggajian.payrollSetPage', $dr);
    }
    public function prosesPayroll(Request $request)
    {
        $username = $request -> username;
        $dataKaryawan = M_Penggajian_Data_Set::where('username', $username) -> first();
        $token = Str::uuid();
        $fToken = Str::replace('-', '', $token);
        $pe = new M_Payroll_Enroll();
        $pe -> token = $fToken;
        $pe -> username = $username;
        $pe -> status_karyawan = $dataKaryawan -> status_karyawan;
        $pe -> status_menikah = $dataKaryawan -> status_menikah;
        $pe -> jumlah_tanggungan = $dataKaryawan -> jumlah_tanggungan;
        $pe -> gaji_pokok = $dataKaryawan -> gaji_pokok;
        $pe -> tunjangan_tetap = $dataKaryawan -> tunjangan_tetap;
        $pe -> hari_kerja = $dataKaryawan -> hari_kerja;
        $pe -> lembur = $dataKaryawan -> lembur;
        $pe -> absent = $dataKaryawan -> absent;
        $pe -> split_shift = $dataKaryawan -> split_shift;
        $pe -> tunjangan_makan = $dataKaryawan -> tunjangan_makan;
        $pe -> kasbon = $dataKaryawan -> kasbon;
        $pe -> service_charge = $dataKaryawan -> service_charge;
        $pe -> ump = $dataKaryawan -> ump;
        $pe -> total_gaji = "0";
        $pe -> active = "1";
        $pe -> save();
        $dr = ['token' => $fToken];
        return \Response::json($dr);  
    }

    public function cetakSlipGaji(Request $request, $token)
    {
        $dataEnroll = M_Payroll_Enroll::where('token', $token) -> first();
        $username = $dataEnroll -> username;
        $hasilPerhitungan = $this -> helperCtr -> payroll($dataEnroll, $username);
        $dataKaryawan = M_Profile_Karyawan::where('username', $username) -> first();
        $userData = $this -> helperCtr -> getUserData();
        $dr = [
            'judul' => 'Slip Gaji',
            'dataPenggajian' => $dataEnroll,
            'dataKaryawan' => $dataKaryawan,
            'hasilPerhitungan' => $hasilPerhitungan,
            'userData' => $userData
        ];
        $pdf = PDF::loadview('app.penggajian.cetakSlipGaji', $dr);
        $pdf -> setPaper('A4', 'portait');
        return $pdf -> stream();
    }

    
}
