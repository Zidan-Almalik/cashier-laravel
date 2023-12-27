<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list alljenis']);
        Permission::create(['name' => 'view alljenis']);
        Permission::create(['name' => 'create alljenis']);
        Permission::create(['name' => 'update alljenis']);
        Permission::create(['name' => 'delete alljenis']);

        Permission::create(['name' => 'list kategoris']);
        Permission::create(['name' => 'view kategoris']);
        Permission::create(['name' => 'create kategoris']);
        Permission::create(['name' => 'update kategoris']);
        Permission::create(['name' => 'delete kategoris']);

        Permission::create(['name' => 'list mejas']);
        Permission::create(['name' => 'view mejas']);
        Permission::create(['name' => 'create mejas']);
        Permission::create(['name' => 'update mejas']);
        Permission::create(['name' => 'delete mejas']);

        Permission::create(['name' => 'list menus']);
        Permission::create(['name' => 'view menus']);
        Permission::create(['name' => 'create menus']);
        Permission::create(['name' => 'update menus']);
        Permission::create(['name' => 'delete menus']);

        Permission::create(['name' => 'list pelanggans']);
        Permission::create(['name' => 'view pelanggans']);
        Permission::create(['name' => 'create pelanggans']);
        Permission::create(['name' => 'update pelanggans']);
        Permission::create(['name' => 'delete pelanggans']);

        Permission::create(['name' => 'list pemesanans']);
        Permission::create(['name' => 'view pemesanans']);
        Permission::create(['name' => 'create pemesanans']);
        Permission::create(['name' => 'update pemesanans']);
        Permission::create(['name' => 'delete pemesanans']);

        Permission::create(['name' => 'list stoks']);
        Permission::create(['name' => 'view stoks']);
        Permission::create(['name' => 'create stoks']);
        Permission::create(['name' => 'update stoks']);
        Permission::create(['name' => 'delete stoks']);

        Permission::create(['name' => 'list transaksidetails']);
        Permission::create(['name' => 'view transaksidetails']);
        Permission::create(['name' => 'create transaksidetails']);
        Permission::create(['name' => 'update transaksidetails']);
        Permission::create(['name' => 'delete transaksidetails']);

        Permission::create(['name' => 'list transakses']);
        Permission::create(['name' => 'view transakses']);
        Permission::create(['name' => 'create transakses']);
        Permission::create(['name' => 'update transakses']);
        Permission::create(['name' => 'delete transakses']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
