<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Profile_Karyawan extends Model
{
    protected $table = 'tbl_profile_karyawan';

    protected $fillable = [
        'username',
        'role_id',
        'nama_lengkap',
        'nik',
        'tanggal_lahir',
        'alamat',
        'jenis_kelamin',
        'tipe',
        'bisa_login',
        'active'
    ];

    public function roleData()
    {
        return $this->belongsTo(M_Role::class, 'role_id', 'kode');
    }
}
