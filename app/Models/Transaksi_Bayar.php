<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi_Bayar extends Model
{
    use HasFactory;
    protected $table = 'transaksi_bayars';
    protected $fillable = [
        'nomor_bayar',
        'id_sewa',
        'tanggal_transaksi',
        'id_bank',
        'id_user'
    ];

    public function product()
    {
        return $this->belongsTo(Master_Product::class, 'id_product');
    }

    public function user()
    {
        return $this->belongsTo(Master_User::class, 'id_user');
    }

    public function bank()
    {
        return $this->belongsTo(Master_Bank::class, 'id_bank');
    }

}
