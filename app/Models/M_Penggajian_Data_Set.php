<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Penggajian_Data_Set extends Model
{
    protected $table = "tbl_penggajian_data_set";

    protected $fillable = [
        'username',
        'status_karyawan',
        'status_menikah',
        'jumlah_tanggungan',
        'gaji_pokok',
        'tunjangan_tetap',
        'hari_kerja',
        'lembur',
        'absent',
        'split_shift',
        'tunjangan_makan',
        'kasbon',
        'service_charge',
        'ump'
    ];

    public function karyawanData()
    {
        return $this->belongsTo(M_Profile_Karyawan::class, 'username', 'username');
    }

}
