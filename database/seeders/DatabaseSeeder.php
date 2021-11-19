<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // insert user default 
        DB::table('tbl_user') -> insert([
            'username' => 'vicky',
            'role' => '1',
            'password' => password_hash('vicky123', PASSWORD_DEFAULT),
            'api_token' => '-',
            'username_parent' => '-',
            'active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // profile user default 
        DB::table('tbl_profile_karyawan') -> insert([
            'username' => 'vicky',
            'nama_lengkap' => 'Vicky Root',
            'nik' => '216522889911',
            'tanggal_lahir' => NULL,
            'alamat' => 'Medan',
            'jenis_kelamin' => 'M',
            'tipe' => 'monthly',
            'bisa_login' => '1',
            'active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
