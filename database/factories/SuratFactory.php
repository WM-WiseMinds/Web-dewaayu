<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Surat>
 */
class SuratFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'perihal' => $this->faker->sentence,
            'tanggal_kegiatan' => $this->faker->date(),
            'hari' => $this->faker->dayOfWeek,
            'jam_kegiatan' => $this->faker->time(),
            'lokasi_kegiatan' => $this->faker->address,
        ];
    }
}
