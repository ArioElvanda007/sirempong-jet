<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Company extends Model
{
    use HasFactory;
    protected $table='master_companys';
    protected $fillable = [
        'nama_company',
        'alamat_company',
        'telp_company',
        'email_company',
        'map_company'
    ];
}
