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
        $user = User::create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'),
        ]);
        $user->assignRole('admin');

        $user = User::create([
            'name' => 'seller',
            'email' => 'seller@example.com',
            'password' => Hash::make('seller123'),
        ]);
        $user->assignRole('seller');

        User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'password' => Hash::make('user123'),
        ]);
    }
}
