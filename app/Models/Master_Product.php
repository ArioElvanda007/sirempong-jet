<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Product extends Model
{
    use HasFactory;
    protected $table = 'master_products';
    protected $fillable = [
        'nama_product',
        'id_jenis',
        'harga_product',
        'harga_promo',
        'jumlah_product',
        'status_promo',
        'gambar'
    ];

    public function jenis()
    {
        return $this->belongsTo(Master_Jenis::class, 'id_jenis');
    }

}
