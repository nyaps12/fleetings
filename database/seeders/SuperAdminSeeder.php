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
            'name' => 'Super Admin', 
            'email' => 'superadmin@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'Admin', 
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'

        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $driver = User::create([
            'firstname' => 'Raffy', 
            'lastname' => 'Limbo', 
            'name' => 'Raffy', 
            'email' => 'raffy@yahoo.com',
            'phone' => '09755258406',
            'address' => '167 Visayas St Phase 4 Payatas B Quezon City',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'available'

        ]);
        $driver->assignRole('driver');

        $driver = User::create([
            'firstname' => 'Jake', 
            'lastname' => 'Bartolay', 
            'name' => 'Jake', 
            'email' => 'jake@yahoo.com',
            'phone' => '09435489822',
            'address' => 'BLGU Payatas PIO, Quezon City, Philippines. A 80 929 els agrada',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'available'
        ]);
        $driver->assignRole('driver');
    }
}