<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblItemPenerimaanBarang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_item_penerimaan_barang', function (Blueprint $table) {
            $table -> id();
            $table -> char('user_request', 100);
            $table -> char('no_gr', 20);
            $table -> char('kode_material', 20);
            $table -> integer('qt');
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
        Schema::dropIfExists('tbl_item_penerimaan_barang');
    }
}
