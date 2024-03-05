<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory(25)->create();

        // Create admin user
        $admin = User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('Password'),
        ]);
        $admin->assignRole('Sekretaris Desa');

        // Create Koordinator TAPM user
        $koordinatorTAPM = User::factory()->create([
            'name' => 'Koordinator TAPM',
            'email' => 'koordinator@example.com',
            'password' => Hash::make('Password'),
        ]);
        $koordinatorTAPM->assignRole('Koor TAPM');
        $koordinatorTAPM->removeRole('Sekretaris Desa');

        // Create 3 Anggota TAPM users
        for ($i = 1; $i <= 3; $i++) {
            $anggotaTAPM = User::factory()->create([
                'name' => 'Anggota TAPM ' . $i,
                'email' => 'anggota' . $i . '@example.com',
                'password' => Hash::make('Password'),
            ]);
            $anggotaTAPM->assignRole('Anggota TAPM');
            $anggotaTAPM->removeRole('Sekretaris Desa');
        }

        $operator = User::factory()->create([
            'name' => 'Operator',
            'email' => 'operator@example.com',
            'password' => Hash::make('Password'),
        ]);

        $operator->assignRole('Operator');
        $operator->removeRole('Sekretaris Desa');
    }
}
