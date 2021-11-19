<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Permintaan_Pembelian extends Model
{
    protected $table = "tbl_permintaan_pembelian";

    protected $fillable = [
        'kode',
        'tanggal',
        'no_pr',
        'kode_project',
        'user_request',
        'user_approve',
        'status',
        'active'
    ];

}
