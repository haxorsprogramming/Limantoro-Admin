<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Supplier extends Model
{   
    protected $table = 'tbl_supplier';

    protected $fillable = [
        'kode',
        'nama',
        'alamat',
        'kota',
        'contact_person',
        'phone_number',
        'npwp',
        'user',
        'active'
    ];
}
