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
            'operator_id' => Operator::factory(),
            'sekretarisdesa_id' => Sekretarisdesa::factory(),
            'tenagaahli_id' => Tenagaahli::factory(),
            'tanggal' => $this->faker->date(),
            'waktu' => $this->faker->time(),
            'tempat' => $this->faker->word,
            'agenda' => $this->faker->text,
            'status' => $this->faker->word,
        ];
    }
}
