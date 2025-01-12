<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\RentalTransactionFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'rental_transactions';
    protected $fillable = [
        'pelanggan_id',
        'pengemudi_id',
        'kendaraan_id',
        'tanggal_mulai',
        'mulai_km',
        'tanggal_akhir',
        'akhir_km',
        'bahan_bakar_habis',
        'bahan_bakar_masuk',
        'note',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'pelanggan_id');
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class, 'pengemudi_id');
    }

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'kendaraan_id');
    }
}
