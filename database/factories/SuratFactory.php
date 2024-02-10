<?php

namespace Database\Factories;

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
            'operator_id' => $this->faker->randomNumber(),
            'no_surat' => $this->faker->word,
            'tanggal_surat' => $this->faker->date(),
            'perihal' => $this->faker->text,
            'lampiran' => $this->faker->word,
            'status' => $this->faker->word,
        ];
    }
}
