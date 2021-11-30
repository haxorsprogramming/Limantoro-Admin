<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\C_Page;
use App\Http\Controllers\C_Auth;
use App\Http\Controllers\C_Supplier;
use App\Http\Controllers\C_Customer;
use App\Http\Controllers\C_Material;
use App\Http\Controllers\C_Karyawan;
use App\Http\Controllers\C_Project;
use App\Http\Controllers\C_Permintaan_Pembelian;
use App\Http\Controllers\C_Persetujuan_Permintaan_Pembelian;
use App\Http\Controllers\C_Pemesanan_Pembelian;
use App\Http\Controllers\C_Penggajian;
use App\Http\Controllers\C_Penerimaan_Barang;
use App\Http\Controllers\C_Pengembalian_Barang;
use App\Http\Controllers\C_Pengembalian_Pembelian;
use App\Http\Controllers\C_Bukti_Keluar;

Route::get('/', [C_Page::class, 'loginPage']);

Route::group(['middleware' => ['Cek_User']], function(){
    Route::get('/cek-jwt', [C_Page::class, 'cekJwt']);
    Route::get('/app', [C_Page::class, 'appPage']);
});

Route::get('/auth/logout', [C_Auth::class, 'logout']);
// Route::post('')
Route::get('/app/beranda', [C_Page::class, 'berandaPage']);
// supplier 
Route::get('/app/supplier', [C_Supplier::class, 'supplierPage']);
Route::get('/app/supplier/datatable', [C_Supplier::class, 'jsonDatatable']);
Route::get('/app/supplier/{codeSupplier}/edit/data', [C_Supplier::class, 'editDataSupplier']);
Route::post('/app/supplier/tambah/proses', [C_Supplier::class, 'prosesTambahSupplier']);
Route::post('/app/supplier/edit/proses', [C_Supplier::class, 'prosesUpdateSupplier']);
Route::post('/app/supplier/delete/proses', [C_Supplier::class, 'prosesDeleteSupplier']);
Route::get('/app/supplier/cetak', [C_Supplier::class, 'cetakSupplier']);
// customer 
Route::get('/app/customer', [C_Customer::class, 'customerPage']);
// material 
Route::get('/app/material', [C_Material::class, 'materialPage']);
Route::get('/app/material/{codeMaterial}/edit/data', [C_Material::class, 'editDataMaterial']);
Route::post('/app/material/tambah/proses', [C_Material::class, 'prosesTambahMaterial']);
Route::post('/app/material/edit/proses', [C_Material::class, 'prosesUpdateMaterial']);
// karyawan 
Route::get('/app/karyawan', [C_Karyawan::class, 'karyawanPage']);
Route::post('/app/karyawan/tambah/proses', [C_Karyawan::class, 'prosesTambahKaryawan']);
// project 
Route::get('/app/project', [C_Project::class, 'projectPage']);
Route::post('/app/project/tambah/proses', [C_Project::class, 'prosesTambahProject']);
Route::get('/app/project/{kdProject}/detail', [C_Project::class, 'detailProject']);
Route::get('/app/project/{kdProject}/detail/sec/dataunit', [C_Project::class, 'dataUnitSection']);
Route::get('/app/project/{kdProject}/detail/sec/materialdaristock', [C_Project::class, 'materialDariStock']);
Route::get('/app/project/{kdProject}/detail/sec/materialtersisa', [C_Project::class, 'materialTersisa']);
// permintaan pembelian 
Route::get('/app/permintaan-pembelian', [C_Permintaan_Pembelian::class, 'permintaanPembelianPage']);
Route::post('/app/permintaan-pembelian/tambah/proses', [C_Permintaan_Pembelian::class, 'prosesPermintaanPembelian']);
Route::get('/app/permintaan-pembelian/{noPr}/print', [C_Permintaan_Pembelian::class, 'cetakPermintaan']);
// persetujuan permintaan pembelian 
Route::get('/app/persetujuan-permintaan-pembelian', [C_Persetujuan_Permintaan_Pembelian::class, 'persetujuanPermintaanPembelianPage']);
Route::get('/app/persetujuan-permintaan-pembelian/{noPr}/data-for-modal', [C_Persetujuan_Permintaan_Pembelian::class, 'dataForModal']);
Route::get('/app/persetujuan-permintaan-pembelian/{noPr}/tabel-permintaan-material', [C_Persetujuan_Permintaan_Pembelian::class, 'tabelPermintaanMaterial']);
Route::post('/app/persetujuan-permintaan-pembelian/proses', [C_Persetujuan_Permintaan_Pembelian::class, 'prosesPersetujuan']);
// pemesanan pembelian 
Route::get('/app/pemesanan-pembelian', [C_Pemesanan_Pembelian::class, 'pemesananPembelianPage']);
Route::post('/app/pemesanan-pembelian/get-material-pemesanan', [C_Pemesanan_Pembelian::class, 'getMaterialData']);
Route::post('/app/pemesanan-pembelian/proses', [C_Pemesanan_Pembelian::class, 'prosesPemesananPembelian']);
// penerimaan barang 
Route::get('/app/penerimaan-barang', [C_Penerimaan_Barang::class, 'penerimaanBarangPage']);
Route::get('/app/penerimaan-barang/{kdSup}/get-po', [C_Penerimaan_Barang::class, 'getPo']);
// pengembalian barang 
Route::get('/app/pengembalian-barang', [C_Pengembalian_Barang::class, 'pengembalianBarangPage']);
// pengembalian pembelian 
Route::get('/app/pengembalian-pembelian', [C_Pengembalian_Pembelian::class, 'pengembalianPembelianPage']);
// bukti keluar
Route::get('/app/bukti-keluar', [C_Bukti_Keluar::class, 'buktiKeluarPage']);
Route::get('/app/bukti-keluar/{noPo}/generate', [C_Bukti_Keluar::class, 'generateBuktiKeluar']);
Route::post('/app/bukti-keluar/generate/proses', [C_Bukti_Keluar::class, 'generateProses']);
// penggajian 
Route::get('/penggajian', [C_Penggajian::class, 'test']);
// API 
Route::post('/login/proses', [C_Auth::class, 'loginProses']);

// jwt 

Route::get('/tes-jwt', [C_Page::class, 'tesJwt']);
