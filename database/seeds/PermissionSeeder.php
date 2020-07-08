<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
use Illuminate\Support\Facades\Hash;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'create permission']);
        Permission::create(['name' => 'read permission']);
        Permission::create(['name' => 'update permission']);
        Permission::create(['name' => 'delete permission']);

        Permission::create(['name' => 'create events']);
        Permission::create(['name' => 'read events']);
        Permission::create(['name' => 'update events']);
        Permission::create(['name' => 'delete events']);

        Permission::create(['name' => 'create reservation']);
        Permission::create(['name' => 'read reservation']);
        Permission::create(['name' => 'update reservation']);
        Permission::create(['name' => 'delete reservation']);

        // or may be done by chaining
        $role = Role::create(['name' => 'regular'])
            ->givePermissionTo(['read user', 'read events', 'create reservation', 'read reservation', 'update reservation', 'delete reservation']);

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());


        //users
        $regular = User::create([
            'name' => 'regular',
            'email' => 'regular@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        
        $regular->assignRole('regular');

        $admin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('12345678'),
        ]);
        
        $admin->assignRole('super-admin');
    }
}
