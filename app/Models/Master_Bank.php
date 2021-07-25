<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Bank extends Model
{
    use HasFactory;
    protected $table = 'master_banks';
    protected $fillable = [
        'nama_bank',
        'nomor_rekening',
        'atas_nama'
    ];
}
