<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Item_Penerimaan_Barang extends Model
{
    protected $table = "tbl_item_penerimaan_barang";

    protected $fillable = [
        'user_request',
        'no_gr',
        'kode_material',
        'qt',
        'active'
    ];
    
    public function materialData()
    {
        return $this->belongsTo(M_Material::class, 'kode_material', 'kode');
    }
}
