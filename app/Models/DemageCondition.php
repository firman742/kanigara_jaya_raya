<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DemageCondition extends Model
{
    /** @use HasFactory<\Database\Factories\DemageConditionFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'demage_conditions';
    protected $fillable = [
        'transaksi_id',
        'posisi',
        'kondisi_masuk',
        'kondisi_keluar',
        'catatan_masuk',
        'catatan_keluar',
    ];

    public function rentalTransaction()
    {
        return $this->belongsTo(RentalTransaction::class, 'transaksi_id');
    }
}
