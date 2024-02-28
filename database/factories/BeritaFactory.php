<?php

namespace Database\Factories;

use App\Models\User;
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
            'user_id' => User::factory(),
            'judul_berita' => $this->faker->sentence,
            'foto' => $this->faker->imageUrl(640, 480), // menghasilkan URL ke gambar acak dengan lebar 640px dan tinggi 480px
            'deskripsi_berita' => $this->faker->paragraph,
            'no_berita' => $this->faker->unique()->numberBetween(1000, 9000),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
