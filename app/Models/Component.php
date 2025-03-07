<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Component extends Model
{
    /** @use HasFactory<\Database\Factories\ComponentFactory> */
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'components';
    protected $primaryKey = 'id'; // Pastikan menggunakan nama kolom ID yang sesuai

    protected $fillable = [
        'id',
        'nama_komponen',
    ];
}
