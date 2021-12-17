<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPengembalianPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengembalian_pembelian', function (Blueprint $table) {
            $table -> id();
            $table -> char('user_request', 50);
            $table -> char('no_prn', 30);
            $table -> date('tanggal');
            $table -> char('kode_supplier', 30);
            $table -> char('no_po', 30);
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
        Schema::dropIfExists('tbl_pengembalian_pembelian');
    }
}
