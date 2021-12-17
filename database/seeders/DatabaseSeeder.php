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
            'role_id' => '1',
            'nama_lengkap' => 'Vicky Root',
            'nik' => '216522889911',
            'tanggal_lahir' => NULL,
            'email' => 'vickyroot@gmail.com',
            'no_hp' => '087828912355',
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
            'role_id' => '3',
            'nama_lengkap' => 'Vicky Manager lapangan',
            'nik' => '216522889911',
            'tanggal_lahir' => NULL,
            'email' => 'vickyroot@gmail.com',
            'no_hp' => '087828912355',
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
        // insert sample customer
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
        // insert role 
        DB::table('tbl_role') -> insert(['kode' => '1','nama' => 'Owner']);
        DB::table('tbl_role') -> insert(['kode' => '2','nama' => 'Manager']);
        DB::table('tbl_role') -> insert(['kode' => '3','nama' => 'Manager Lapangan']);
        DB::table('tbl_role') -> insert(['kode' => '4','nama' => 'Purchasing']);
        // insert default setting 
        $this -> setSetting('NAMA_PERUSAHAAN', 'Nama perusahaan', '-', 'PT. LIMANTORO AGUNG PROPERTY');
        $this -> setSetting('ALAMAT', 'Alamat lengkap perusahaan', '-', 'Jln. Cemara asri, No 22');
        $this -> setSetting('TELEPON', 'Nomor telepon', '-', '061 4123 421');
        $this -> setSetting('PIMPINAN', 'Nama pimpinan', '-', 'ADMIN');
        $this -> setSetting('EMAIL', 'Email perusahaan', '-', 'halo@limantoroagungproperty.com');
    }

    function setSetting($idSetting, $nama, $deks, $nilai)
    {
        DB::table('tbl_setting') -> insert([
            'id_setting' => $idSetting,
            'nama' => $nama,
            'deksripsi' => $deks,
            'nilai' => $nilai,
            'created_at' => now(),
            'updated_at' => now(),
            'active' => '1'
        ]);
    }
}
