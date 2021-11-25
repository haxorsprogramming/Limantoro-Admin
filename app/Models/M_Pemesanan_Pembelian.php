<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Pemesanan_Pembelian extends Model
{
    protected $table = "tbl_pemesanan_pembelian";

    protected $fillable = [
        'token',
        'no_po',
        'tanggal',
        'no_pr',
        'kode_supplier',
        'no_poy',
        'user_approve',
        'user_lock',
        'active'
    ]; 
}
