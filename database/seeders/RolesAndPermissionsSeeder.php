<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        Permission::create(['name' => 'view']);
        Permission::create(['name' => 'create']);
        Permission::create(['name' => 'edit']);
        Permission::create(['name' => 'delete']);
        Permission::create(['name' => 'publish']);
        Permission::create(['name' => 'unpublish']);

        // Create roles and assign created permissions

        // Moderator role
        $role = Role::create(['name' => 'Moderator']);
        $role -> givePermissionTo(['view', 'create', 'edit', 'publish', 'unpublish']);

        // ReadOnly role
        $role = Role::create(['name' => 'ReadOnly']);
        $role -> givePermissionTo(['view']);

        // Manager role
        $role = Role::create(['name' => 'Manager']);
        $role -> givePermissionTo(['view', 'create', 'edit', 'delete', 'publish', 'unpublish']);

        // Assistant Manager role
        $role = Role::create(['name' => 'Assistant Manager']);
        $role -> givePermissionTo(['view', 'create', 'edit', 'delete']);

        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
