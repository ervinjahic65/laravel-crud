<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::firstOrCreate(['name' => 'super-admin', 'email' => 'super_admin@mail.com', 'user_role' => 'superAdmin', 'password' => Hash::make('superadmin12345')]);
        User::firstOrCreate(['name' => 'admin', 'email' => 'admin@mail.com', 'user_role' => 'admin', 'password' => Hash::make('admin12345')]);
        User::firstOrCreate(['name' => 'gost', 'email' => 'gost@mail.com', 'user_role' => 'gost', 'password' => Hash::make('gost12345')]);
    }
}
