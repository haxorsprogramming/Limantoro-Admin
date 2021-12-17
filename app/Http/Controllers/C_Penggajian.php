<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\IndonesiaPayrollCalculator\PayrollCalculator;

use App\Models\M_Profile_Karyawan;

class C_Penggajian extends Controller
{
    public function datakaryawan()
    {
        $datakaryawan = M_Profile_Karyawan::all();
        $dr = ['dataKaryawan' => $datakaryawan];
        return view('app.penggajian.dataKaryawanPage', $dr);
    }

    public function test()
    {
    }

    public function tesPenggajian()
    {
        $payrollCalculator = new PayrollCalculator();
        $payrollCalculator->method = PayrollCalculator::NETT_CALCULATION;
        $payrollCalculator->taxNumber = 23;

        // Set data karyawan
        $payrollCalculator->employee->permanentStatus = true; // Tetap (true), Tidak Tetap (false), secara default sudah terisi nilai true.
        $payrollCalculator->employee->maritalStatus = true; // Menikah (true), Tidak Menikah/Single (false), secara default sudah terisi nilai false.
        $payrollCalculator->employee->hasNPWP = true; // Secara default sudah terisi nilai true. Jika tidak memiliki npwp akan dikenakan potongan tambahan 20%
        $payrollCalculator->employee->numOfDependentsFamily = 0;
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
        $payrollCalculator->provisions->company->calculateBPJSKesehatan = false;
        $payrollCalculator->provisions->company->JKK = true;
        $payrollCalculator->provisions->company->JKM = true;
        $payrollCalculator->provisions->company->JHT = false;
        $payrollCalculator->provisions->company->JIP = false;

        $payrollCalculator->provisions->company->riskGrade = 2; // Golongan resiko ketenagakerjaan, umumnya 2
        $payrollCalculator->provisions->company->absentPenalty = 55000; // Perhitungan nilai potongan gaji/hari sebagai penalty.
        $payrollCalculator->provisions->company->latetimePenalty = 100000;
        $hasilPerhitungan = $payrollCalculator->getCalculation();
        return \Response::json($hasilPerhitungan);
    }
}
