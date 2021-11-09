<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_Supplier extends Model
{
    protected $primaryKey = 'code';
    
    protected $table = 'suppliers';

    protected $fillable = [
        'code','name', 'address', 'city', 'contact_person','phone_number','npwp'
        ,'admin_code'
    ];
}
