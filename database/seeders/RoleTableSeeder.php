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

        // create factory permissions
        Permission::create(['name' => 'view factories']);
        Permission::create(['name' => 'create factories']);
        Permission::create(['name' => 'edit factories']);
        Permission::create(['name' => 'delete factories']);

        // create areacodes permissions
        Permission::create(['name' => 'view areacodes']);
        Permission::create(['name' => 'create areacodes']);
        Permission::create(['name' => 'edit areacodes']);
        Permission::create(['name' => 'delete areacodes']);

        // create areas permissions
        Permission::create(['name' => 'view areas']);
        Permission::create(['name' => 'create areas']);
        Permission::create(['name' => 'edit areas']);
        Permission::create(['name' => 'delete areas']);

        // create equipments permissions
        Permission::create(['name' => 'view equipments']);
        Permission::create(['name' => 'create equipments']);
        Permission::create(['name' => 'edit equipments']);
        Permission::create(['name' => 'delete equipments']);

        // create processes permissions
        Permission::create(['name' => 'view processes']);
        Permission::create(['name' => 'create processes']);
        Permission::create(['name' => 'edit processes']);
        Permission::create(['name' => 'delete processes']);

        // create parts permissions
        Permission::create(['name' => 'view parts']);
        Permission::create(['name' => 'create parts']);
        Permission::create(['name' => 'edit parts']);
        Permission::create(['name' => 'delete parts']);

        // create periodicities permissions
        Permission::create(['name' => 'view periodicities']);
        Permission::create(['name' => 'create periodicities']);
        Permission::create(['name' => 'edit periodicities']);
        Permission::create(['name' => 'delete periodicities']);

        // create gamuts permissions
        Permission::create(['name' => 'view gamuts']);
        Permission::create(['name' => 'create gamuts']);
        Permission::create(['name' => 'edit gamuts']);
        Permission::create(['name' => 'delete gamuts']);

        // create workorders permissions
        Permission::create(['name' => 'view work_orders']);
        Permission::create(['name' => 'create work_orders']);
        Permission::create(['name' => 'edit work_orders']);
        Permission::create(['name' => 'delete work_orders']);
        Permission::create(['name' => 'execute work_orders']);
        Permission::create(['name' => 'postpone work_orders']);
        Permission::create(['name' => 'cancel work_orders']);
        Permission::create(['name' => 'assign work_orders']);

        // create work permissions
        Permission::create(['name' => 'view work']);
        Permission::create(['name' => 'create work']);
        Permission::create(['name' => 'edit work']);
        Permission::create(['name' => 'delete work']);

        // create tasks permissions
        Permission::create(['name' => 'view tasks']);
        Permission::create(['name' => 'create tasks']);
        Permission::create(['name' => 'edit tasks']);
        Permission::create(['name' => 'delete tasks']);

        // create services permissions
        Permission::create(['name' => 'view services']);
        Permission::create(['name' => 'create services']);
        Permission::create(['name' => 'edit services']);
        Permission::create(['name' => 'delete services']);

        // create criticities permissions
        Permission::create(['name' => 'view criticities']);
        Permission::create(['name' => 'create criticities']);
        Permission::create(['name' => 'edit criticities']);
        Permission::create(['name' => 'delete criticities']);

        // create priorities permissions
        Permission::create(['name' => 'view priorities']);
        Permission::create(['name' => 'create priorities']);
        Permission::create(['name' => 'edit priorities']);
        Permission::create(['name' => 'delete priorities']);

        // create readings permissions
        Permission::create(['name' => 'view readings']);
        Permission::create(['name' => 'create readings']);
        Permission::create(['name' => 'edit readings']);
        Permission::create(['name' => 'delete readings']);

        // create purchasing permissions
        Permission::create(['name' => 'view purchases']);
        Permission::create(['name' => 'create purchases']);
        Permission::create(['name' => 'review purchases']);
        Permission::create(['name' => 'consult purchases']);
        Permission::create(['name' => 'receive purchases']);
        Permission::create(['name' => 'edit purchases']);
        Permission::create(['name' => 'delete purchases']);

        // create roles and assign created permissions
        // this can be done as separate statements
        Role::create(['name' => 'Maintenance Officer'])
            ->givePermissionTo('create work_orders')
            ->givePermissionTo('edit work_orders')
            ->givePermissionTo('assign work_orders')
            ->givePermissionTo('postpone work_orders')
            ->givePermissionTo('review purchases')
            ->givePermissionTo('cancel work_orders')
            ->givePermissionTo('delete work_orders')
            ->givePermissionTo('view work_orders');

        Role::create(['name' => 'Purchasing Officer'])
            ->givePermissionTo('create purchases')
            ->givePermissionTo('edit purchases')
            ->givePermissionTo('consult purchases')
            //->givePermissionTo('review purchases')
            ->givePermissionTo('delete purchases')
            ->givePermissionTo('view purchases');

        Role::create(['name' => 'Electrical Technician'])
            ->givePermissionTo('create work_orders')
            ->givePermissionTo('execute work_orders')
            ->givePermissionTo('view work_orders');

        Role::create(['name' => 'Mechanical Technician'])
            ->givePermissionTo('create work_orders')
            ->givePermissionTo('execute work_orders')
            ->givePermissionTo('view work_orders');

        Role::create(['name' => 'Lubrication Technician'])
            ->givePermissionTo('create work_orders')
            ->givePermissionTo('execute work_orders')
            ->givePermissionTo('view work_orders');



        $role = Role::create(['name' => 'Super Admin']);
        $role->givePermissionTo(Permission::all());

        // Give superAdmin rights to User ID 1
        User::find(1)->assignRole(['Super Admin']);
        // Give WO rights to User ID 2
        User::find(2)->assignRole(['Maintenance Officer']);

        // Give PO rights to User ID 12
        User::find(12)->assignRole(['Purchasing Officer']);


    }
}
