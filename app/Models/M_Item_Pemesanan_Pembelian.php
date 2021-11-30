<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Item_Pemesanan_Pembelian extends Model
{
    protected $table = "tbl_item_pemesanan_pembelian";

    protected $fillable = [
        'no_po',
        'kode_material',
        'qt',
        'price',
        'note',
        'active'
    ];

    public function materialData()
    {
        return $this->belongsTo(M_Material::class, 'kode_material', 'kode');
    }

}
