<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Unit extends Model
{
    protected $table = "units";
    
    protected $fillable = [
        'ordinal',
        'name',
        'land_size',
        'building_size',
        'builded',
        'sold',
        'selling_price',
        'marketing_fee',
        'project_code',
        'admin_code'
    ];
}
