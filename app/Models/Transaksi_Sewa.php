<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Sewa extends Model
{
    use HasFactory;
    protected $table='transaksi_sewas';
    protected $fillable = [
        'nomor_sewa',
        'tanggal_transaksi',
        'tanggal_sewa',
        'tanggal_kembali',
        'jumlah_hari',
        'id_product',
        'harga_product',
        'harga_promo',
        'jumlah_sewa',
        'id_user',
        'status_transaksi'
    ];

    public function product()
    {
        return $this->belongsTo(Master_Product::class, 'id_product');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

}
