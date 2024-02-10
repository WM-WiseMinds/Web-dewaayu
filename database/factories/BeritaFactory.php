<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Berita>
 */
class BeritaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween('1', '5'),
            'operator_id' => $this->faker->numberBetween('1', '6'),
            'judul_berita' => $this->faker->word,
            'foto' => $this->faker->word,
            'deskripsi_berita' => $this->faker->text,
            'created_at' => $this->faker->dateTime(),
        ];
    }
}
