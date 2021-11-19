<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblMaterial extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_material', function (Blueprint $table) {
            $table -> id();
            $table -> char('kode', 50);
            $table -> char('nama', 200);
            $table -> char('satuan', 20);
            $table -> integer('jumlah');
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
        Schema::dropIfExists('tbl_material');
    }
}
