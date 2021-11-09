<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Project extends Model
{
    protected $table = "projects";
    protected $primaryKey = "code";

    protected $fillable = [
        'code',
        'name',
        'type',
        'date',
        'is_finished',
        'in_charge_id'
    ];
}
