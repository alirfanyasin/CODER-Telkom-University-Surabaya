<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'super-admin']);
        Role::create(['name' => 'admin']);
        Role::create(['name' => 'user']);
        Role::create(['name' => 'guest']);
        Role::create(['name' => 'alumni']);
        Role::create(['name' => 'skil-dev']);

        Permission::create(['name' => 'verified']);
        Permission::create(['name' => 'unverified']);
        Permission::create(['name' => 'create-event']);
        Permission::create(['name' => 'edit-event']);
        Permission::create(['name' => 'delete-event']);
        Permission::create(['name' => 'read-event']);
    }
}
