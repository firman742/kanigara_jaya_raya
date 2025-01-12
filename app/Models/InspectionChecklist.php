<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InspectionChecklist extends Model
{
    /** @use HasFactory<\Database\Factories\InspectionChecklistFactory> */
    use HasFactory, SoftDeletes;

    protected $table = 'inspection_checklists';
    protected $fillable = [
        'transaksi_id',
        'komponen_id',
        'kondisi_masuk',
        'kondisi_keluar',
    ];

    public function rentalTransaction()
    {
        return $this->belongsTo(RentalTransaction::class, 'transaksi_id');
    }

    public function component()
    {
        return $this->belongsTo(Component::class, 'komponen_id');
    }
}
