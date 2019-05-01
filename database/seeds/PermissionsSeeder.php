<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'create_users']); // admin
        Permission::create(['name' => 'edit_users']); // admin
        Permission::create(['name' => 'create_items']); // admin & seller
        Permission::create(['name' => 'edit_items']); // admin & seller
        Permission::create(['name' => 'delete_items']); // admin & seller
    }
}
