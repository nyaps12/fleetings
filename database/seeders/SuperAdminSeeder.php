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
            'email' => 'superadmin@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'
        ])->assignRole('Super Admin');

        // Creating Admin User
        User::factory()->create([
            'name' => 'Admin', 
            'email' => 'admin@yahoo.com',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => '../assets/img/avatars/admin.png',
            'usertype' => 'admin'
        ])->assignRole('Admin');

        User::factory()->create([
            'firstname' => 'Raffy', 
            'lastname' => 'Limbo', 
            'name' => 'Raffy', 
            'email' => 'raffy@yahoo.com',
            'phone' => '09435488895',
            'address' => 'BLGU Payatas PIO, Quezon City, Philippines. A 80 929 els agrada',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Jake', 
            'lastname' => 'Bartolay', 
            'name' => 'Jake', 
            'email' => 'jake@yahoo.com',
            'phone' => '09435489822',
            'address' => 'Lot 103-117 Alabang-Zapote Road corner Filinvest Ave., Westgate Alabang, Muntinlupa M.M',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
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
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Greg', 
            'lastname' => 'Olson', 
            'name' => 'Greg Olson', 
            'email' => 'greg.olson@yahoo.com',
            'phone' => '09286368063',
            'address' => 'SMSL 182-183 SM City San Lazaro, Felix Huertas corner A.H. Lacson Streets, Santa Cruz',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Tristan', 
            'lastname' => 'Carter', 
            'name' => 'Tristan Carter', 
            'email' => 'tristan.carter@yahoo.com',
            'phone' => '09286343217',
            'address' => '8435 West Service RoadMarcelo Green Village South Superhighway',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Jesse', 
            'lastname' => 'Stevens', 
            'name' => 'Jesse Stevens', 
            'email' => 'jesse.stevens@yahoo.com',
            'phone' => '09286349157',
            'address' => '166 M. L. Quezon STreet, Femar Building',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Tomothy', 
            'lastname' => 'Sanchez', 
            'name' => 'Tomothy Sanchez', 
            'email' => 'tomothy.sanchez@yahoo.com',
            'phone' => '09286335583',
            'address' => 'Dalisay Building, Tungkong Mangga',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'June', 
            'lastname' => 'Willis', 
            'name' => 'June Willis', 
            'email' => 'june.willis@yahoo.com',
            'phone' => '09286340959',
            'address' => '3-B Industrial Road 1400',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Ethan', 
            'lastname' => 'Garrett', 
            'name' => 'Ethan Garrett', 
            'email' => 'ethan.garrett@yahoo.com',
            'phone' => '09286382808',
            'address' => 'G/F paramount Building, 434 Quintin Paredes Street, Binondo',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Lucy', 
            'lastname' => 'Rice', 
            'name' => 'Lucy Rice', 
            'email' => 'lucy.rice@yahoo.com',
            'phone' => '09286362383',
            'address' => 'Ground Floor, SM City, Manila East Road',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');

        User::factory()->create([
            'firstname' => 'Lillian', 
            'lastname' => 'Byrd', 
            'name' => 'Lillian Byrd', 
            'email' => 'lillian.byrd@yahoo.com',
            'phone' => '09286335774',
            'address' => '1977 Commonwealth Avenue, Diliman Quezon City',
            'password' => Hash::make('admin123'),
            'profile_photo_path' => 'assets/img/avatars/driver.jpg',
            'status' => 'active'
        ])->assignRole('driver');
    }
}
