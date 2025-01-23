<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RentalTransaction extends Model
{
    /** @use HasFactory<\Database\Factories\RentalTransactionFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'rental_transactions';
    protected $fillable = [
        'pelanggan_id',
        'pengemudi_id',
        'kendaraan_id',
        'tanggal_mulai',
        'mulai_km',
        'bahan_bakar_masuk',
        'tanggal_rencana_kembali',
        'tanggal_kembali',
        'akhir_km',
        'bahan_bakar_habis',
        'note',
        'status_rental',
        'out_foto_depan',
        'out_foto_belakang',
        'out_foto_kiri',
        'out_foto_kanan',
        'out_demage_note',
        'back_foto_depan',
        'back_foto_belakang',
        'back_foto_kiri',
        'back_foto_kanan',
        'back_demage_note',
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
