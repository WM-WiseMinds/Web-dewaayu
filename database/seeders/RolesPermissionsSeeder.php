<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'read']);
        Permission::create(['name' => 'update']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'export']);
        Permission::create(['name' => 'konfirmasi']);
        Permission::create(['name' => 'penugasan']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'Operator']);
        $role->givePermissionTo('create', 'read', 'update', 'delete', 'export');

        // or may be done by chaining
        $role = Role::create(['name' => 'Anggota TAPM'])
            ->givePermissionTo(['konfirmasi', 'read']);

        $role = Role::create(['name' => 'Koor TAPM'])
            ->givePermissionTo(['konfirmasi', 'read']);

        $role = Role::create(['name' => 'Sekretaris Desa']);
        $role->givePermissionTo(Permission::all());
    }
}
