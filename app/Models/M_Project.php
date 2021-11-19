<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Project extends Model
{
    protected $table = "tbl_project";

    protected $fillable = [
        'kode',
        'nama',
        'deksripsi',
        'tipe',
        'tanggal',
        'alamat',
        'penanggung_jawab',
        'user',
        'selesai',
        'active'
    ];
}
