<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Data_Unit extends Model
{
    protected $table = "tbl_data_unit";

    protected $fillable = [
        'kode',
        'nama',
        'ukuran_tanah',
        'ukuran_bangunan',
        'jumlah_unit',
        'unit_terjual',
        'harga_jual',
        'marketing_fee',
        'kode_project',
        'user',
        'active'
    ];
}
