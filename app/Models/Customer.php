<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model
{
    /** @use HasFactory<\Database\Factories\CustomerFactory> */
    use HasFactory, SoftDeletes;

    protected $table = "customers";
    protected $fillable = [
        'nama_pelanggan',
        'perusahaan',
        'alamat',
        'nomor_telepon',
        'validasi_ktp',
        'tanggal_validasi_ktp',
    ];
}
