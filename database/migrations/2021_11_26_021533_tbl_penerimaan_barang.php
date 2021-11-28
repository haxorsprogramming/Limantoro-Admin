<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPenerimaanBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_penerimaan_barang', function (Blueprint $table) {
            $table -> id();
            $table -> char('user_request', 50);
            $table -> char('no_gr', 30);
            $table -> date('tanggal');
            $table -> char('no_surat', 30);
            $table -> char('kode_supplier', 50);
            $table -> char('no_po', 30);
            $table -> char('checker_code', 50);
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
        Schema::dropIfExists('tbl_penerimaan_barang');
    }
}
