<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_project', function (Blueprint $table) {
            $table -> id();
            $table -> char('kode', 50);
            $table -> char('nama', 200);
            $table -> text('deksripsi');
            $table -> char('tipe', 40);
            $table -> date('tanggal');
            $table -> text('alamat');
            $table -> char('penanggung_jawab', 200);
            $table -> char('user', 100);
            $table -> char('selesai', 1);
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
        Schema::dropIfExists('tbl_project');
    }
}
