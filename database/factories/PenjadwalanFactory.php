<?php

namespace Database\Factories;

use App\Models\Operator;
use App\Models\Sekretarisdesa;
use App\Models\Tenagaahli;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Penjadwalan>
 */
class PenjadwalanFactory extends Factory
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
            'tanggal_kegiatan' => $this->faker->date(),
            'waktu_kegiatan' => $this->faker->time(),
            'detail_kegiatan' => $this->faker->text($maxNbChars = 200),
            'lokasi_kegiatan' => $this->faker->address,
        ];
    }
}
