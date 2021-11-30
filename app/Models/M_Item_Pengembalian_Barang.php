<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Item_Pengembalian_Barang extends Model
{
    protected $table = "tbl_item_pengembalian_barang";

    protected $fillable = [
        'user_request',
        'no_grn',
        'kode_material',
        'qt',
        'active'
    ];
    
    public function materialData()
    {
        return $this->belongsTo(M_Material::class, 'kode_material', 'kode');
    }
}
