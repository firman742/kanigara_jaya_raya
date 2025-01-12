<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    /** @use HasFactory<\Database\Factories\DriverFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'drivers';
    protected $fillable = [
        'nama_pengemudi',
        'nomor_telepon',
        'alamat',
        'lisensi',
        'masa_berlaku_lisensi',
    ];
}
