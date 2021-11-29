<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Steevenz\IndonesiaPayrollCalculator\PayrollCalculator;

class C_Penggajian extends Controller
{
    public function test()
    {
        $payrollCalculator = new PayrollCalculator();
        $payrollCalculator->method = PayrollCalculator::NETT_CALCULATION;
        $payrollCalculator->taxNumber = 21;
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
        $payrollCalculator -> company -> allowances = 8000000;
        $payrollCalculator -> success = false;
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

        $payrollCalculator->provisions->company->calculateSplitShifts = true;
        $payrollCalculator->provisions->company->splitShiftsRate = 25000; // Rate Split Shift perusahaan
        $payrollCalculator->provisions->company->calculateBPJSKesehatan = false; // Apakah perusahaan menyediakan BPJS Kesehatan / tidak untuk orang tersebut

        // Apakah perusahaan menyediakan BPJS Ketenagakerjaan / tidak untuk orang tersebut
        $payrollCalculator->provisions->company->JKK = false; 
        $payrollCalculator->provisions->company->JKM = false; 
        $payrollCalculator->provisions->company->JHT = false; 
        $payrollCalculator->provisions->company->JIP = false; 

        $payrollCalculator->provisions->company->riskGrade = 2; // Golongan resiko ketenagakerjaan, umumnya 2
        $payrollCalculator->provisions->company->absentPenalty = 55000; // Perhitungan nilai potongan gaji/hari sebagai penalty.
        $payrollCalculator->provisions->company->latetimePenalty = 100000; // Perhitungan nilai keterlambatan sebagai penalty.
        
        // Mengambil hasil perhitungan
        
        $gaji = $payrollCalculator->getCalculation();
        // return \Response::json($gaji);
    }
    public function getMaterialData(Request $request)
    {
        // cari material data 
        $dataMaterial = M_Item_Permintaan_Pembelian::where('no_pr', $request -> noPr) -> get();
        foreach($dataMaterial as $dm){
            $arrTemp['id'] = $dm['id'];
            $arrTemp['kode_material'] = $dm['kode_material'];
            $arrTemp['qt'] = $dm['qt'];
            $arrTemp['qt_approve'] = $dm['qt_approve'];
            $arrTemp['nama_material'] = $dm['materialData']['nama'];
            $arrTemp['satuan'] = $dm['materialData']['satuan'];
            $dr['dataMaterial'][] = $arrTemp;
        }
        // $dr = ['status' => $noPr];
        return \Response::json($dr);
    }
    public function prosesPemesananPembelian(Request $request)
    {
        // {'tanggal':tanggal, 'noPr':noPr, 'kdSupplier':kdSupplier, 'material':material}
        $totalPesananPembelian = M_Pemesanan_Pembelian::count();
        if($totalPesananPembelian == 0){
            $urutan = (int) substr(0, 3, 3);
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }else{
            $noPoLast = M_Pemesanan_Pembelian::orderby('id', 'desc') -> limit(1) -> get();
            $noPo = $noPoLast[0] -> no_po;
            $lastId = substr($noPo, -1);
            $urutan = $lastId;
            $urutan++;
            $huruf = "PO-";
            $noPo = $huruf . sprintf("%07s", $urutan);
        }
        // save data pemesanan pembelian 
        $pemesanan = new M_Pemesanan_Pembelian();
        $pemesanan -> token = Str::uuid();
        $pemesanan -> no_po = $noPo;
        $pemesanan -> tanggal = $request -> tanggal;
        $pemesanan -> no_pr = $request -> noPr;
        $pemesanan -> kode_supplier = $request -> kdSupplier;
        $pemesanan -> no_poy = "-";
        $pemesanan -> user_request = session('userLogin');
        $pemesanan -> user_lock = "-";
        $pemesanan -> user_approve = session('userLogin');
        $pemesanan -> no_poe = "-";
        $pemesanan -> active = "1";
        $pemesanan -> save();
        // save ke item pemesanan 
        $material = $request -> material;
        $or = 0;
        foreach($material as $mat){
            $ip = new M_Item_Pemesanan_Pembelian();
            $ip -> no_po = $noPo;
            $ip -> kode_material = $material[$or]['kode'];
            $ip -> qt = $material[$or]['qt'];
            $ip -> price = $material[$or]['hargaAt'];
            $ip -> note = $material[$or]['note'];
            $ip -> active = "1";
            $ip -> save();
            $or++;
        }
        $dr = ['status' => 'sukses'];
        return \Response::json($dr);
    }
}
