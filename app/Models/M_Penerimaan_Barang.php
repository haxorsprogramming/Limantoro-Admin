<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Penerimaan_Barang extends Model
{
    protected $table = "tbl_penerimaan_barang";

    protected $fillable = [
        'user_request',
        'no_gr',
        'tanggal',
        'no_surat',
        'kode_supplier',
        'no_po',
        'checker_code',
        'active'
    ];

}
