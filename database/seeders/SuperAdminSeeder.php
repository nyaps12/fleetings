<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
        User::factory()->create([
            'name' => 'Super Admin', 
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'
        ])->assignRole('Super Admin');

        // Creating Admin User
        User::factory()->create([
            'name' => 'Admin', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'
        ])->assignRole('Admin');

        User::factory()->create([
            'firstname' => 'Raffy', 
            'lastname' => 'Limbo', 
            'name' => 'Raffy', 
            'email' => 'raffy@gmail.com',
            'phone' => '09435488895',
            'address' => 'BLGU Payatas PIO, Quezon City, Philippines. A 80 929 els agrada',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active',
            'dlcodes' => '1'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Jake', 
            'lastname' => 'Bartolay', 
            'name' => 'Jake', 
            'email' => 'jake@gmail.com',
            'phone' => '09435489822',
            'address' => 'Lot 103-117 Alabang-Zapote Road corner Filinvest Ave., Westgate Alabang, Muntinlupa M.M',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active',
            'dlcodes' => '1'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Soham', 
            'lastname' => 'Carr', 
            'name' => 'Soham Carr', 
            'email' => 'soham.carr@gmail.com',
            'phone' => '09286343067',
            'address' => '3/F Jade Building, 335 Senator Gil Puyat Avenue',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active',
            'dlcodes' => '2'
        ])->assignRole('driver');
    }
}
