<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblSupplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_supplier', function (Blueprint $table) {
            $table -> id();
            $table -> char('kode', 50);
            $table -> char('nama', 200);
            $table -> text('alamat');
            $table -> char('kota', 50);
            $table -> char('contact_person', 100);
            $table -> char('phone_number', 20);
            $table -> char('npwp', 50);
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
        Schema::dropIfExists('tbl_supplier');
    }
}
