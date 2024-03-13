<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $superAdmin = User::create([
            'name' => 'superadmin', 
            'email' => 'superadmin@yahoo.com',
            'password' => Hash::make('superadmin123')
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'admin', 
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('admin123')
        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $driver = User::create([
            'name' => 'driver', 
            'email' => 'driver@yahoo.com',
            'password' => Hash::make('driver123')
        ]);
        $driver->assignRole('driver');
    }
}