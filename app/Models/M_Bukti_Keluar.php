<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Bukti_Keluar extends Model
{
    protected $table = 'tbl_bukti_keluar';

    protected $fillable = [
        'token',
        'user_request',
        'no_poe',
        'tanggal',
        'is_paid',
        'tanggal_dibayar',
        'note',
        'bank_1',
        'no_bank_1',
        'total_1',
        'bank_2',
        'no_bank_2',
        'total_2',
        'discount',
        'active'
    ];
}
