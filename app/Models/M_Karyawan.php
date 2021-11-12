<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Karyawan extends Model
{
    protected $table = 'users';

    protected $fillable = [
        'code','admin_code','id_number','name','photo',
        'birth_date','address','gender','role_id','type',
        'password','is_active','can_login',
    ];

}
