<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // //
        // // Super admin role
        // $superAdmin = [
        //     "name" => "superadmin",
        //     "email" => "superadmin@gmail.com",
        //     "password" => Hash::make('12345678'),
        // ];

        // $superAdminRole = User::create($superAdmin);
        // $superAdminRole->assignRole('superadmin');

        // Admin role
        $admin = [
            "name" => "Yahya Taufani",
            "email" => "yahya@gmail.com",
            "password" => Hash::make('12345678'),
        ];

        $adminRole = User::create($admin);
        $adminRole->assignRole('admin');

        // // Users role
        // $user = [
        //     "name" => "user",
        //     "email" => "user@gmail.com",
        //     "password" => Hash::make('12345678'),
        // ];

        // $userRole = User::create($user);
        // $userRole->assignRole('user');
    }
}
