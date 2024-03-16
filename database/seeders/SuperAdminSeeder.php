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
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'
        ]);
        $superAdmin->assignRole('Super Admin');

        // Creating Admin User
        $admin = User::create([
            'name' => 'admin', 
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'

        ]);
        $admin->assignRole('Admin');

        // Creating Product Manager User
        $driver = User::create([
            'name' => 'Raffy', 
            'email' => 'raffy@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg'

        ]);
        $driver->assignRole('driver');

        $driver = User::create([
            'name' => 'Jake', 
            'email' => 'jake@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg'

        ]);
        $driver->assignRole('driver');
    }
}