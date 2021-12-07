<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPenggajianDataSet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penggajian_data_set', function (Blueprint $table) {
            $table -> id();
            $table -> char('username', 100);
            $table -> char('status_karyawan', 20);
            $table -> char('status_menikah', 20);
            $table -> char('jumlah_tanggungan', 2);
            $table -> char('gaji_pokok', 20);
            $table -> char('tunjangan_tetap', 20);
            $table -> char('hari_kerja', 3);
            $table -> char('lembur', 3);
            $table -> char('absent', 3);
            $table -> char('split_shift', 0);
            $table -> char('tunjangan_makan', 20);
            $table -> char('kasbon', 20);
            $table -> char('service_charge', 20);
            $table -> char('ump', 20);
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
        Schema::dropIfExists('tbl_penggajian_data_set');
    }
}
