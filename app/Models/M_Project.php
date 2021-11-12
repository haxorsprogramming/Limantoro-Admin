<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Project extends Model
{
    protected $table = "projects";

    protected $fillable = [
        'admin_code',
        'code',
        'name',
        'type',
        'date',
        'address',
        'is_finished',
        'in_charge_code'
    ];
}
