<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehicle extends Model
{
    /** @use HasFactory<\Database\Factories\VehicleFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'vehicles';
    protected $fillable = [
        'plat_nomor',
        'jenis',
        'seri',
        'tahun',
        'warna',
        'nomor_mesin',
        'nomor_sasis',
    ];
}
