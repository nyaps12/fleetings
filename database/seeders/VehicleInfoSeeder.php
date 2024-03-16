<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VehicleInfo;

class VehicleInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Using the factory to create fake data
        VehicleInfo::factory()->count(10)->create();
    }
}
