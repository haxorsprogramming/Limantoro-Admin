<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\IndonesiaPayrollCalculator\PayrollCalculator;
use Illuminate\Support\Str;
use PDF;

use App\Models\M_Profile_Karyawan;
use App\Models\M_Penggajian_Data_Set;
use App\Models\M_Payroll_Enroll;

class C_Penggajian extends Controller
{
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
        // 'username':username, 'statusKawin':statusKawin, 'jumlahTanggungan':jumlahTanggungan, 'gajiPokok':gajiPokok, 'tunjanganTetap':tunjanganTetap,
        //         'tunjanganMakan':tunjanganMakan, 'hariKerja':hariKerja, 'lembur':lembur, 'absent':absent, 'splitShift':splitShift, 'kasbon':kasbon
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
        $payrollCalculator = new PayrollCalculator();
        $dataKaryawan = M_Penggajian_Data_Set::where('username', $username) -> first();
        // Khusus Perhitungan PPH 21 -------

        // Calculation method
        $payrollCalculator->method = PayrollCalculator::GROSS_CALCULATION;

        // Tax Number
        $payrollCalculator->taxNumber = 21;

        // Set data karyawan
        $payrollCalculator->employee->permanentStatus = true; // Tetap (true), Tidak Tetap (false), secara default sudah terisi nilai true.
        $payrollCalculator->employee->maritalStatus = true; // Menikah (true), Tidak Menikah/Single (false), secara default sudah terisi nilai false.
        $payrollCalculator->employee->hasNPWP = true; // Secara default sudah terisi nilai true. Jika tidak memiliki npwp akan dikenakan potongan tambahan 20%
        $payrollCalculator->employee->numOfDependentsFamily = 0; // Jumlah tanggungan, max 5 jika lebih akan dikenakan tambahannya perorang sesuai ketentuan BPJS Kesehatan

        // Set data pendapatan karyawan
        $payrollCalculator->employee->earnings->base = $dataKaryawan -> gaji_pokok; // Besaran nilai gaji pokok/bulan
        $payrollCalculator->employee->earnings->fixedAllowance = $dataKaryawan -> tunjangan_tetap; // Besaran nilai tunjangan tetap
        $payrollCalculator->employee->calculateHolidayAllowance = 0; // jumlah bulan proporsional
        // NOTE: besaran nilai diatas bukan nilai hasil proses perhitungan absensi tetapi nilai default sebagai faktor perhitungan gaji.

        // Set data kehadiran karyawan
        $payrollCalculator->employee->presences->workDays = $dataKaryawan -> hari_kerja; // jumlah hari masuk kerja
        $payrollCalculator->employee->presences->overtime = $dataKaryawan -> lembur; //  perhitungan jumlah lembur dalam satuan jam
        $payrollCalculator->employee->presences->latetime = 0; //  perhitungan jumlah keterlambatan dalam satuan jam
        $payrollCalculator->employee->presences->travelDays = 0; //  perhitungan jumlah hari kepergian dinas
        $payrollCalculator->employee->presences->indisposedDays = 0; //  perhitungan jumlah hari sakit yang telah memiliki surat dokter
        $payrollCalculator->employee->presences->absentDays = $dataKaryawan -> absent; //  perhitungan jumlah hari alpha
        $payrollCalculator->employee->presences->splitShifts = $dataKaryawan -> split_shift; // perhitungan jumlah split shift

        // Set data tunjangan karyawan diluar tunjangan BPJS Kesehatan dan Ketenagakerjaan
        $payrollCalculator->employee->allowances->offsetSet('tunjanganMakan', $dataKaryawan -> tunjangan_makan);
        
        // NOTE: Jumlah allowances tidak ada batasan

        // Set data potongan karyawan diluar potongan BPJS Kesehatan dan Ketenagakerjaan
        $payrollCalculator->employee->deductions->offsetSet('kasbon', $dataKaryawan -> kasbon);
        // NOTE: Jumlah deductions tidak ada batasan

        // Set data bonus karyawan diluar tunjangan
        $payrollCalculator->employee->bonus->offsetSet('serviceCharge', 0);
        // NOTE: Jumlah bonus tidak ada batasan

        // Set data ketentuan negara
        $payrollCalculator->provisions->state->overtimeRegulationCalculation = true; // Jika false maka akan dihitung sesuai kebijakan perusahaan
        $payrollCalculator->provisions->state->provinceMinimumWage = 3940972; // Ketentuan UMP sesuai propinsi lokasi perusahaan

        // Set data ketentuan perusahaan
        $payrollCalculator->provisions->company->numOfWorkingDays = 25; // Jumlah hari kerja dalam satu bulan
        $payrollCalculator->provisions->company->numOfWorkingHours = 8; // Jumlah hari kerja dalam satu hari
        $payrollCalculator->provisions->company->calculateOvertime = true; // Apakah perusahaan menghitung lembur

        // Jika $payrollCalculator->provisions->state->overtimeRegulationCalculation = false;
        $payrollCalculator->provisions->company->overtimeRate = 10000; // Nilai rate overtime per jam, Jika bernilai 0 namun $payrollCalculator->provisions->company->calculateOvertime, maka rate akan dihitung secara otomatis berdasarkan renumerasi besaran gaji, hari dan jam kerja

        $payrollCalculator->provisions->company->calculateSplitShifts = true; // Apakah perusahan menghitung split shifts
        $payrollCalculator->provisions->company->splitShiftsRate = 25000; // Rate Split Shift perusahaan
        $payrollCalculator->provisions->company->calculateBPJSKesehatan = true; // Apakah perusahaan menyediakan BPJS Kesehatan / tidak untuk orang tersebut

        // Apakah perusahaan menyediakan BPJS Ketenagakerjaan / tidak untuk orang tersebut
        $payrollCalculator->provisions->company->JKK = false; 
        $payrollCalculator->provisions->company->JKM = false; 
        $payrollCalculator->provisions->company->JHT = false; 
        $payrollCalculator->provisions->company->JIP = false; 

        $payrollCalculator->provisions->company->riskGrade = 2; // Golongan resiko ketenagakerjaan, umumnya 2
        $payrollCalculator->provisions->company->absentPenalty = 55000; // Perhitungan nilai potongan gaji/hari sebagai penalty.
        $payrollCalculator->provisions->company->latetimePenalty = 100000; // Perhitungan nilai keterlambatan sebagai penalty.

        // Mengambil hasil perhitungan
        $hasilPerhitungan = $payrollCalculator->getCalculation();
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
        $dataKaryawan = M_Profile_Karyawan::where('username', $username) -> first();
        $dr = [
            'judul' => 'Slip Gaji',
            'dataPenggajian' => $dataEnroll,
            'dataKaryawan' => $dataKaryawan
        ];
        $pdf = PDF::loadview('app.penggajian.cetakSlipGaji', $dr);
        $pdf -> setPaper('A4', 'landscape');
        return $pdf -> stream();
    }

    public function tesPenggajian()
    {
        $payrollCalculator = new PayrollCalculator();
        // Khusus Perhitungan PPH 21 -------

        // Calculation method
        $payrollCalculator->method = PayrollCalculator::GROSS_CALCULATION;

        // Tax Number
        $payrollCalculator->taxNumber = 21;

        // Set data karyawan
        $payrollCalculator->employee->permanentStatus = true; // Tetap (true), Tidak Tetap (false), secara default sudah terisi nilai true.
        $payrollCalculator->employee->maritalStatus = true; // Menikah (true), Tidak Menikah/Single (false), secara default sudah terisi nilai false.
        $payrollCalculator->employee->hasNPWP = true; // Secara default sudah terisi nilai true. Jika tidak memiliki npwp akan dikenakan potongan tambahan 20%
        $payrollCalculator->employee->numOfDependentsFamily = 0; // Jumlah tanggungan, max 5 jika lebih akan dikenakan tambahannya perorang sesuai ketentuan BPJS Kesehatan

        // Set data pendapatan karyawan
        $payrollCalculator->employee->earnings->base = 8000000; // Besaran nilai gaji pokok/bulan
        $payrollCalculator->employee->earnings->fixedAllowance = 0; // Besaran nilai tunjangan tetap
        $payrollCalculator->employee->calculateHolidayAllowance = 0; // jumlah bulan proporsional
        // NOTE: besaran nilai diatas bukan nilai hasil proses perhitungan absensi tetapi nilai default sebagai faktor perhitungan gaji.

        // Set data kehadiran karyawan
        $payrollCalculator->employee->presences->workDays = 25; // jumlah hari masuk kerja
        $payrollCalculator->employee->presences->overtime = 2; //  perhitungan jumlah lembur dalam satuan jam
        $payrollCalculator->employee->presences->latetime = 0; //  perhitungan jumlah keterlambatan dalam satuan jam
        $payrollCalculator->employee->presences->travelDays = 0; //  perhitungan jumlah hari kepergian dinas
        $payrollCalculator->employee->presences->indisposedDays = 0; //  perhitungan jumlah hari sakit yang telah memiliki surat dokter
        $payrollCalculator->employee->presences->absentDays = 0; //  perhitungan jumlah hari alpha
        $payrollCalculator->employee->presences->splitShifts = 0; // perhitungan jumlah split shift

        // Set data tunjangan karyawan diluar tunjangan BPJS Kesehatan dan Ketenagakerjaan
        $payrollCalculator->employee->allowances->offsetSet('tunjanganMakan', 100000);
        
        // NOTE: Jumlah allowances tidak ada batasan

        // Set data potongan karyawan diluar potongan BPJS Kesehatan dan Ketenagakerjaan
        $payrollCalculator->employee->deductions->offsetSet('kasbon', 100000);
        // NOTE: Jumlah deductions tidak ada batasan

        // Set data bonus karyawan diluar tunjangan
        $payrollCalculator->employee->bonus->offsetSet('serviceCharge', 100000);
        // NOTE: Jumlah bonus tidak ada batasan

        // Set data ketentuan negara
        $payrollCalculator->provisions->state->overtimeRegulationCalculation = true; // Jika false maka akan dihitung sesuai kebijakan perusahaan
        $payrollCalculator->provisions->state->provinceMinimumWage = 3940972; // Ketentuan UMP sesuai propinsi lokasi perusahaan

        // Set data ketentuan perusahaan
        $payrollCalculator->provisions->company->numOfWorkingDays = 25; // Jumlah hari kerja dalam satu bulan
        $payrollCalculator->provisions->company->numOfWorkingHours = 8; // Jumlah hari kerja dalam satu hari
        $payrollCalculator->provisions->company->calculateOvertime = true; // Apakah perusahaan menghitung lembur

        // Jika $payrollCalculator->provisions->state->overtimeRegulationCalculation = false;
        $payrollCalculator->provisions->company->overtimeRate = 10000; // Nilai rate overtime per jam, Jika bernilai 0 namun $payrollCalculator->provisions->company->calculateOvertime, maka rate akan dihitung secara otomatis berdasarkan renumerasi besaran gaji, hari dan jam kerja

        $payrollCalculator->provisions->company->calculateSplitShifts = true; // Apakah perusahan menghitung split shifts
        $payrollCalculator->provisions->company->splitShiftsRate = 25000; // Rate Split Shift perusahaan
        $payrollCalculator->provisions->company->calculateBPJSKesehatan = true; // Apakah perusahaan menyediakan BPJS Kesehatan / tidak untuk orang tersebut

        // Apakah perusahaan menyediakan BPJS Ketenagakerjaan / tidak untuk orang tersebut
        $payrollCalculator->provisions->company->JKK = false; 
        $payrollCalculator->provisions->company->JKM = false; 
        $payrollCalculator->provisions->company->JHT = false; 
        $payrollCalculator->provisions->company->JIP = false; 

        $payrollCalculator->provisions->company->riskGrade = 2; // Golongan resiko ketenagakerjaan, umumnya 2
        $payrollCalculator->provisions->company->absentPenalty = 55000; // Perhitungan nilai potongan gaji/hari sebagai penalty.
        $payrollCalculator->provisions->company->latetimePenalty = 100000; // Perhitungan nilai keterlambatan sebagai penalty.

        // Mengambil hasil perhitungan
        $hasilPerhitungan = $payrollCalculator->getCalculation();
        return \Response::json($hasilPerhitungan);
    }
}
