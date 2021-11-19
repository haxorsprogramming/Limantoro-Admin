<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblDataUnit extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_data_unit', function (Blueprint $table) {
            $table -> id();
            $table -> char('kode', 50);
            $table -> char('nama', 100);
            $table -> char('ukuran_tanah', 30);
            $table -> char('ukuran_bangunan', 30);
            $table -> integer('jumlah_unit');
            $table -> integer('unit_terjual');
            $table -> integer('harga_jual');
            $table -> integer('marketing_fee');
            $table -> char('kode_project', 100);
            $table -> char('user', 100);
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
        Schema::dropIfExists('tbl_data_unit');
    }
}
