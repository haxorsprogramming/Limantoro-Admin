<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblItemPermintaanPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_item_permintaan_pembelian', function (Blueprint $table) {
            $table -> id();
            $table -> char('no_pr', 20);
            $table -> char('kode_project', 100);
            $table -> char('kode_material', 100);
            $table -> text('pesan');
            $table -> integer('qt');
            $table -> integer('qt_approve');
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
        Schema::dropIfExists('tbl_item_permintaan_pembelian');
    }
}
