<?php

namespace Database\Seeders;

use App\Models\Component;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ComponentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $components = [
            'Starter / Ignition System',
            'Label Oli / Kartu OK',
            'Radio / Tape Merk',
            'STNK',
            'KIR',
            'Alarm',
            'Lighter / Pemantik',
            'Asbak',
            'Seat Cover / Sarung Jok',
            'Safety Belt',
            'Head Rest',
            'Lampu Plafond',
            'Karpet Dasar',
            'Dongkrak & Gagang',
            'Kotak P3K',
            'Segitiga Pengaman',
            'Kunci Roda',
            'Tool set',
            'Kaca Spion Dalam',
            'Kaca Spion Luar',
            'Dop Roda 4 buah',
            'Velg Racing',
            'Karpet Bagasi',
            'penutup ban',
            'ban serep',
            'antenna',
            'cd player merk',
            'Emblem / sticker',
            'Lampu-lampu sen',
            'Lampu besar',
            'Lampu kecil',
            'Lampu Rem',
            'Lampu belakang',
            'Lampu Mundur',
            'Lampu Kabut',
            'Asuransi kendaraan',
        ];

        foreach ($components as $component) {
            Component::create(['nama_komponen' => $component]);
        }
    }
}
