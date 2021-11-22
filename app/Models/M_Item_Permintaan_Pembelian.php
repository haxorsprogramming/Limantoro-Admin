<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Item_Permintaan_Pembelian extends Model
{
    protected $table = "tbl_item_permintaan_pembelian";

    protected $fillable = [
        'no_pr',
        'kode_project',
        'kode_material',
        'pesan',
        'qt',
        'qt_approve',
        'status',
        'active'
    ];
}
