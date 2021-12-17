<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Payroll_Enroll extends Model
{
    protected $table = "tbl_payroll_enroll";
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
}
