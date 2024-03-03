<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            'password' => bcrypt('Password'),
        ]);
        $admin->assignRole('Sekretaris Desa');
        $admin->removeRole('Operator');

        // Create Koordinator TAPM user
        $koordinatorTAPM = User::factory()->create([
            'name' => 'Koordinator TAPM',
            'email' => 'koordinator@example.com',
            'password' => bcrypt('Password'),
        ]);
        $koordinatorTAPM->assignRole('Koor TAPM');
        $koordinatorTAPM->removeRole('Operator');

        // Create 3 Anggota TAPM users
        for ($i = 1; $i <= 3; $i++) {
            $anggotaTAPM = User::factory()->create([
                'name' => 'Anggota TAPM ' . $i,
                'email' => 'anggota' . $i . '@example.com',
                'password' => bcrypt('Password'),
            ]);
            $anggotaTAPM->assignRole('Anggota TAPM');
            $anggotaTAPM->removeRole('Operator');
        }
    }
}
