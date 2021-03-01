<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models;
use App\Models\User;

class RoleTableSeeder extends Seeder
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

        // create dashboard permissions
        Permission::create(['name' => 'view dashboard']);

        

        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo(Permission::all());

        // Give superAdmin rights to User ID 1
        User::find(1)->first()->assignRole(['Super Admin']);

        // or may be done by chaining
        /* $role = Role::create(['name' => 'moderator'])
            ->givePermissionTo(['publish articles', 'unpublish articles']); */


    }
}
