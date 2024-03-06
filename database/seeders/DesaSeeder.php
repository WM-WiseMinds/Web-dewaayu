<?php

namespace Database\Seeders;

use App\Models\Desa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Desa::factory()->count(10)->create();

        Desa::factory()->create([
            'user_id' => 26,
            'nama_desa' => 'Desa A',
        ]);
    }
}
