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
        VehicleInfo::factory()->create([
            'vehicle_id' => '210065',
            'vehicle_brand' => 'Ford',
            'year_model' => 2015,
            'vehicle_type' => 'SUV',
            'plate_number' => 'USQ-280',
            'load_capacity' => 1575.56, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '879145',
            'vehicle_brand' => 'Subaru',
            'year_model' => 2003,
            'vehicle_type' => 'Truck',
            'plate_number' => 'NNI-193',
            'load_capacity' => 2833.51, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '647319',
            'vehicle_brand' => 'Toyota',
            'year_model' => 2015,
            'vehicle_type' => 'Sedan',
            'plate_number' => 'FN3H55',
            'load_capacity' => 1795.53, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '364211',
            'vehicle_brand' => 'Honda',
            'year_model' => 2016,
            'vehicle_type' => 'Motorcycle',
            'plate_number' => 'EVM386',
            'load_capacity' => 210.52, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '342179',
            'vehicle_brand' => 'Nissan',
            'year_model' => 2012,
            'vehicle_type' => 'SUV',
            'plate_number' => 'GLU178',
            'load_capacity' => 1636.62, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '731468',
            'vehicle_brand' => 'Mitsubishi',
            'year_model' => 2018,
            'vehicle_type' => 'SUV',
            'plate_number' => 'PU658L6',
            'load_capacity' => 2010.11, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '186425',
            'vehicle_brand' => 'Audi',
            'year_model' => 2019,
            'vehicle_type' => 'Sedan',
            'plate_number' => 'DRD8346',
            'load_capacity' => 1700.66, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '672459',
            'vehicle_brand' => 'Volvo',
            'year_model' => 2022,
            'vehicle_type' => 'Truck',
            'plate_number' => 'FJ8Q71',
            'load_capacity' => 18000.52, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '3104698',
            'vehicle_brand' => 'Acura',
            'year_model' => 2019,
            'vehicle_type' => 'Truck',
            'plate_number' => 'DRD8346',
            'load_capacity' => 20000.12, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);

        VehicleInfo::factory()->create([
            'vehicle_id' => '912756',
            'vehicle_brand' => 'Yamaha',
            'year_model' => 2020,
            'vehicle_type' => 'Motorcycle',
            'plate_number' => 'JL7V64',
            'load_capacity' => 175.20, // example value
            'status' => 'available',
            'profile_photo_path' => 'example_profile_photo_path.jpg',
            // You can set created_at and updated_at if needed
        ]);
        
    }
}
