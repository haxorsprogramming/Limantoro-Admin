<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Material extends Model
{
    protected $table = "materials";

    protected $fillable = [
        'code',
        'name',
        'satuan',
        'admin_code'
    ];
}
