<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master_Jenis extends Model
{
    use HasFactory;
    protected $table='master_jenis';
    protected $fillable =[
        'jenis'
    ];
}
