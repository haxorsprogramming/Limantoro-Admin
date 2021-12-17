<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPayrollEnroll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_payroll_enroll', function (Blueprint $table) {
            $table -> id();
            $table -> char('username', 100);
            $table -> char('status_karyawan', 20) -> nullable();
            $table -> char('status_menikah', 20) -> nullable();
            $table -> char('jumlah_tanggungan', 2) -> nullable();
            $table -> char('gaji_pokok', 20) -> nullable();
            $table -> char('tunjangan_tetap', 20) -> nullable();
            $table -> char('hari_kerja', 3) -> nullable();
            $table -> char('lembur', 3) -> nullable();
            $table -> char('absent', 3) -> nullable();
            $table -> char('split_shift', 0) -> nullable();
            $table -> char('tunjangan_makan', 20) -> nullable();
            $table -> char('kasbon', 20) -> nullable();
            $table -> char('service_charge', 20) -> nullable();
            $table -> char('ump', 20) -> nullable();
            $table -> char('total_gaji', 30);
            $table -> timestamps(); 
            $table -> char('active', 1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_payroll_enroll');
    }
}
