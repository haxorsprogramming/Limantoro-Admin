<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPemesananPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pemesanan_pembelian', function (Blueprint $table) {
            $table -> id();
            $table -> char('token', 50);
            $table -> char('no_po', 40);
            $table -> date('tanggal');
            $table -> char('no_pr', 40);
            $table -> char('kode_supplier', 30);
            $table -> char('no_poy', 40);
            $table -> char('user_request', 40);
            $table -> char('user_approve', 50);
            $table -> char('user_lock', 100);
            $table -> char('no_poe', 40);
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
        Schema::dropIfExists('tbl_pemesanan_pembelian');
    }
}
