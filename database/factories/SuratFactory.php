<?php

namespace Database\Factories;

use App\Models\Desa;
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
        $userIds = User::pluck('id')->toArray();
        shuffle($userIds);

        return [
            'pengirim_id' => $userIds[0],
            'penerima_id' => $userIds[1],
            'desa_id' => $this->faker->randomElement(Desa::pluck('id')->toArray()),
            'jenis_surat' => $this->faker->randomElement(['Surat Masuk', 'Surat Keluar']),
            'pengirim_eksternal' => $this->faker->name,
            'perihal' => $this->faker->sentence,
            'tanggal_kegiatan' => $this->faker->date(),
            'hari' => $this->faker->dayOfWeek,
            'waktu' => $this->faker->time(),
            'lokasi_kegiatan' => $this->faker->address,
            'status' => $this->faker->randomElement(['Dikirim', 'Dikonfirmasi']),
            'file_surat' => $this->faker->file('public/storage/source', 'public/storage/surat', false),
        ];
    }
}
