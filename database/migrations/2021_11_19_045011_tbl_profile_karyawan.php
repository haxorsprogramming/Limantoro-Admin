<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblProfileKaryawan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_profile_karyawan', function (Blueprint $table) {
            $table -> id();
            $table -> char('username', 50);
            $table -> char('nama_lengkap', 100);
            $table -> char('nik', 30);
            $table -> date('tanggal_lahir') -> nullable();
            $table -> text('alamat');
            $table -> char('jenis_kelamin', 1);
            $table -> char('tipe', 30);
            $table -> char('bisa_login', 1);
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
        Schema::dropIfExists('tbl_profile_karyawan');
    }
}
