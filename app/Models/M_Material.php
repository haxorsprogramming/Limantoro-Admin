<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Material extends Model
{
    protected $table = "tbl_material";

    protected $fillable = [
        'kode',
        'nama',
        'satuan',
        'admin_code',
        'jumlah',
        'user',
        'active'
    ];
}
