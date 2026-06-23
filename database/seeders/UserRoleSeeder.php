<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    // public function run(): void
    // {
    //     // 1. Create the Admin User
    //     User::updateOrCreate(
    //         ['email' => 'admin@kaarigar.com'], // Checks if this email exists
    //         [
    //             'name' => 'Admin',
    //             'password' => Hash::make('admin123456'),
    //             'role' => 'admin', // Sets the role as admin
    //         ]
    //     );

    //     // 2. Create a Worker User
    //     User::updateOrCreate(
    //         ['email' => 'worker@kaarigar.com'],
    //         [
    //             'name' => 'Worker',
    //             'password' => Hash::make('worker123456'),
    //             'role' => 'worker', // Sets the role as worker
    //         ]
    //     );

    //     // 3. Create a Customer User
    //     User::updateOrCreate(
    //         ['email' => 'customer@kaarigar.com'],
    //         [
    //             'name' => 'Customer',
    //             'password' => Hash::make('customer123456'),
    //             'role' => 'customer', // Sets the role as customer
    //         ]
    //     );
    // }
}