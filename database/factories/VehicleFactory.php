<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
     /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'plat_nomor' => strtoupper(fake()->regexify('[A-Z]{1,2}[0-9]{1,4}[A-Z]{1,3}')), // Contoh: B1234XYZ
            'jenis' => fake()->randomElement(['SUV', 'MPV', 'Crossover', 'Sedan']),
            'seri' => fake()->word(),
            'tahun' => fake()->numberBetween(2000, date('Y')),
            'warna' => fake()->safeColorName(),
            'nomor_mesin' => strtoupper(fake()->regexify('[A-Z0-9]{10,15}')), // Contoh: 1NZ-FE123456
            'nomor_sasis' => strtoupper(fake()->regexify('[A-Z0-9]{17}')), // Contoh: JTDBT123456789012
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
