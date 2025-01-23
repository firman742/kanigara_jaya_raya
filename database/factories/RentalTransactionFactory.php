<?php

namespace Database\Factories;

use App\Models\Driver;
use App\Models\Vehicle;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RentalTransaction>
 */
class RentalTransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggan_id' => Customer::factory(),
            'pengemudi_id' => Driver::factory(),
            'kendaraan_id' => Vehicle::factory(),
            'tanggal_mulai' => $this->faker->dateTimeBetween('-1 month', 'now'),
            'mulai_km' => $this->faker->numberBetween(0, 100000),
            'tanggal_akhir' => $this->faker->dateTimeBetween('now', '+1 month'),
            'akhir_km' => $this->faker->numberBetween(0, 100000),
            'bahan_bakar_habis' => $this->faker->numberBetween(0, 100),
            'bahan_bakar_masuk' => $this->faker->numberBetween(0, 100),
            'note' => $this->faker->sentence(),
        ];
    }
}
