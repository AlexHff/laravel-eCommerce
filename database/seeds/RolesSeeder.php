<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo('create_users');
        $role->givePermissionTo('edit_users');
        $role->givePermissionTo('create_items');
        $role->givePermissionTo('edit_items');
        $role->givePermissionTo('delete_items');
        $role = Role::create(['name' => 'seller']);
        $role->givePermissionTo('create_items');
        $role->givePermissionTo('edit_items');
        $role->givePermissionTo('delete_items');
    }
}
