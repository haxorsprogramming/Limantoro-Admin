<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblItemPemesananPembelian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_item_pemesanan_pembelian', function (Blueprint $table) {
            $table -> id();
            $table -> char('no_po', 30);
            $table -> char('kode_material', 30);
            $table -> integer('qt');
            $table -> double('price');
            $table -> text('note') -> nullable();
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
        Schema::dropIfExists('tbl_item_pemesanan_pembelian');
    }
}
