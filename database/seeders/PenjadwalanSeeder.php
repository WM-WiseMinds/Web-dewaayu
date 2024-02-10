<?php

namespace Database\Seeders;

use App\Models\Penjadwalan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenjadwalanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Penjadwalan::factory(10)->create();
    }
}
