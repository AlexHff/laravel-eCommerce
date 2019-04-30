<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * Create one admin.
         */

        User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
            'isAdmin' => true,
        ]);

        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
        ]);
    }
}
