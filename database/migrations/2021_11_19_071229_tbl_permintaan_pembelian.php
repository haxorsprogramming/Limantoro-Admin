<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblPermintaanPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_permintaan_pembelian', function (Blueprint $table) {
            $table -> id();
            $table -> char('kode', 50);
            $table -> date('tanggal');
            $table -> char('no_pr', 20);
            $table -> char('kode_project', 100);
            $table -> char('user_request', 100);
            $table -> char('user_approve', 100);
            $table -> char('status', 20);
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
        Schema::dropIfExists('tbl_permintaan_pembelian');
    }
}
