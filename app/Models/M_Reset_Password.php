<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class M_Reset_Password extends Model
{
    protected $table = "tbl_reset_password";

    protected $fillable = [
        'token',
        'email',
        'status'
    ];
}
