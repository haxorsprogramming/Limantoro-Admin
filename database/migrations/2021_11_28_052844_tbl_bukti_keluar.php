<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TblBuktiKeluar extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_bukti_keluar', function (Blueprint $table) {
            $table -> id();
            $table -> char('token', 50);
            $table -> char('user_request', 100);
            $table -> char('no_poe', 20);
            $table -> date('tanggal');
            $table -> char('is_paid', 1);
            $table -> date('tanggal_dibayar');
            $table -> text('note') -> nullable();
            $table -> char('bank_1', 50);
            $table -> char('no_bank_1', 50);
            $table -> char('total_1', 50);
            $table -> char('bank_2', 50);
            $table -> char('no_bank_2', 50);
            $table -> char('total_2', 50);
            $table -> char('discount', 30);
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
        Schema::dropIfExists('tbl_bukti_keluar');
    }
}
