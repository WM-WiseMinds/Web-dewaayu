<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RolesPermissionsSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DesaSeeder::class);
        // $this->call(SuratSeeder::class);
        $this->call(BeritaSeeder::class);
        // $this->call(PenjadwalanSeeder::class);
        // $this->call(SuratSeeder::class);
    }
}
