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
        // role user 1 (owner), 2(manager), 3(manager lapangan), 4(purchasing)

        // insert user default  1 (owner)
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
        // insert user default 2 (manager lapangan)
        DB::table('tbl_user') -> insert([
            'username' => 'vicky-ml',
            'role' => '3',
            'password' => password_hash('vicky123', PASSWORD_DEFAULT),
            'api_token' => '-',
            'username_parent' => 'vicky',
            'active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        DB::table('tbl_profile_karyawan') -> insert([
            'username' => 'vicky-ml',
            'nama_lengkap' => 'Vicky Manager lapangan',
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
        // insert sample project 
        DB::table('tbl_project') -> insert([
            'kode' => 'PR001',
            'nama' => 'SDN 101938 Adolina',
            'deksripsi' => 'Project pembangunan ruang kelas SDN 101938 adolina',
            'tipe' => 'sekolah',
            'tanggal' => now(),
            'alamat' => 'Desa Adolina, Kecamatan Perbaungan',
            'penanggung_jawab' => 'vicky-ml',
            'user' => 'vicky',
            'selesai' => '0',
            'active' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // insert sample supplier 
        DB::table('tbl_supplier') -> insert([
            'kode' => 'SP001',
            'nama' => 'Anugrah Jaya Bangunan',
            'alamat' => 'Jln. Kabupaten, No. 12',
            'kota' => 'Perbaungan',
            'contact_person' => 'Prastowo',
            'phone_number' => '082278990011',
            'npwp' => '8999 1222 7822',
            'user' => 'vicky',
            'active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        // inser sample customer
        DB::table('tbl_customer') -> insert([
            'kode' => 'SP001',
            'nama' => 'Riska Umaiyah',
            'alamat' => 'Jln. Perjuangan, No. 14',
            'kota' => 'Medan',
            'contact_person' => 'Riska',
            'phone_number' => '087899227811',
            'npwp' => '1455 1345 4122',
            'user' => 'vicky',
            'active' => '1',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
