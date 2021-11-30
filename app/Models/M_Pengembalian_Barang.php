<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Pengembalian_Barang extends Model
{
    protected $table = "tbl_pengembalian_barang";

    protected $fillable = [
        'user_request',
        'no_grn',
        'tanggal',
        'kode_supplier',
        'no_po',
        'checker_code',
        'active'
    ];

    public function supplierData()
    {
        return $this->belongsTo(M_Supplier::class, 'kode_supplier', 'kode');
    }
}
