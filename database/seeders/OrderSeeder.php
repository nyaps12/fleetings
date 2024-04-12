<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\order;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        Order::factory()->create([
            'sender_name' => 'Raffy Limbo',
            'sender_phone' => '09063105003',
            'sender_address' => 'Litex Payatas Q.C',
            'receiver_name' => 'Jake Bartolay',
            'receiver_phone' => '0987654321',
            'receiver_address' => '110 Malumanay, Diliman Quezon City',
            'product' => 'Headset',
            'product_price' => 520.99,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse Pasig, Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Marion Villamor',
            'sender_phone' => '09123554798',
            'sender_address' => 'Quezon Ave',
            'receiver_name' => 'Arvin Cubalan',
            'receiver_phone' => '0987654321',
            'receiver_address' => '104 Cenacle Dr, Quezon City',
            'product' => 'Iphone 14',
            'product_price' => 47000.99,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse Pasig, Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Chrystine Jaucian',
            'sender_phone' => '09321456987',
            'sender_address' => 'Commonwealth QC',
            'receiver_name' => 'Jc Janapin',
            'receiver_phone' => '09789987456',
            'receiver_address' => 'Golden Shower Grace Gospel Church, Payatas B, Quezon City,',
            'product' => 'Keyboard',
            'product_price' => 430.00,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse Pasig, Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Hannah Marie Lactao',
            'sender_phone' => '09654987132',
            'sender_address' => 'Tandang Sora QC',
            'receiver_name' => 'Brix Fajardo',
            'receiver_phone' => '09321123654',
            'receiver_address' => 'Sta. Cruz 2 jordan plaines subdivision',
            'product' => 'Dog Food',
            'product_price' => 900.00,
            'product_quantity' => 3,
            'status' => 'shipped',
            'warehouse' => 'Warehouse Pasig, Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Jhonell Aquino',
            'sender_phone' => '09654123789',
            'sender_address' => 'Batasan QC',
            'receiver_name' => 'John Paul Caballes',
            'receiver_phone' => '09654789123',
            'receiver_address' => 'Deparo Caloocan',
            'product' => 'Razer Mouse',
            'product_price' => 1120.00,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Ronnie Del Pilar',
            'sender_phone' => '09321456456',
            'sender_address' => 'Repablik',
            'receiver_name' => 'Kardo Ilocto',
            'receiver_phone' => '09060665498',
            'receiver_address' => 'Tuna King, Tomas Morato Ave, QC',
            'product' => 'Charger',
            'product_price' => 99.00,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'John Paul Fajardo',
            'sender_phone' => '09654123789',
            'sender_address' => '98 sct. limbaga st.',
            'receiver_name' => 'John Lloyd Cabala',
            'receiver_phone' => '09654789221',
            'receiver_address' => 'ABAR QC - Vapeshop',
            'product' => 'Vape',
            'product_price' => 2450.00,
            'product_quantity' => 2,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Jaffy Aquino',
            'sender_phone' => '09654123887',
            'sender_address' => 'Batasan QC',
            'receiver_name' => 'Brix Lacsa',
            'receiver_phone' => '09654789331',
            'receiver_address' => '28 Central Ave, Diliman QC',
            'product' => 'Tumbler',
            'product_price' => 580.89,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Jane Marcos',
            'sender_phone' => '09668723789',
            'sender_address' => 'Batasan QC',
            'receiver_name' => 'Ramz Ocampo',
            'receiver_phone' => '09654885123',
            'receiver_address' => '14 Sampaguita Ave, Holy Spirit QC',
            'product' => 'Razer Mouse',
            'product_price' => 1120.00,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Anne Arroyo',
            'sender_phone' => '09654221789',
            'sender_address' => 'Payatas QC',
            'receiver_name' => 'Paul Magulod',
            'receiver_phone' => '09654789778',
            'receiver_address' => 'Bush & Blair Store',
            'product' => 'T-Shirt',
            'product_price' => 650.00,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);

        Order::factory()->create([
            'sender_name' => 'Jemboy Campo',
            'sender_phone' => '09334123789',
            'sender_address' => 'Gk Bulaklakan',
            'receiver_name' => 'Edu Aniban',
            'receiver_phone' => '09634789123',
            'receiver_address' => 'Aninion Residence, Caloocan',
            'product' => 'Hair Blower',
            'product_price' => 350.00,
            'product_quantity' => 1,
            'status' => 'shipped',
            'warehouse' => 'Warehouse #6 Pines, Mandaluyong Metro Manila',
        ]);
    }
}
