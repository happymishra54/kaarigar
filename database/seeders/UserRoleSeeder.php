<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{    
    public function run(): void
    {
        // 1. Create the Admin User
        User::updateOrCreate(
            ['email' => 'admin@kaarigar.net'], // Checks if this email exists
            [
                'name' => 'Admin',
                'password' => Hash::make('Admin.@8825'), // Hashes the password
                'role' => 'admin', // Sets the role as admin
            ]
        );
    }
}