<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Kembali extends Model
{
    use HasFactory;
    protected $table = 'transaksi_kembalis';
    protected $fillable = [
        'nomor_kembali',
        'tanggal_kembali',
        'id_sewa',
        'id_user'
    ];
}
