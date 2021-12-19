<?php

namespace App\Http\Controllers;
use Steevenz\IndonesiaPayrollCalculator\PayrollCalculator;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class C_Helper extends Controller
{
    public function getUserData()
    {
        $key    = env('JWT_KEY');
        $jwt    = $_COOKIE['K_TOKEN'];
        $data   = JWT::decode($jwt, new Key($key, 'HS256'));
        return $data;
    }
    public function convertRole($role)
    {
        if($role == '1'){
            $caps = "Owner";
        }elseif($role == '2'){
            $caps = "Manager";
        }elseif($role == '3'){
            $caps = "Manager Lapangan";
        }else{
            $caps = "Purchasing";
        }
        return $caps;
    }

    public function payroll( $dataKaryawan, $username)
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
        $payrollCalculator->provisions->company->numOfWorkingHours = 8; // Jumlah jam kerja dalam satu hari
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
        return $hasilPerhitungan;
    }

    public function compareTanggal($tglCompare, $tglSekarang)
    {
      if(strtotime($tglCompare) < strtotime($tglSekarang)){
        return false;
      }else{
        return true;
      }
    }

}
