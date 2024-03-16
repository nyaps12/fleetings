<?php

namespace Database\Factories;

use App\Models\VehicleInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

class VehicleInfoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = VehicleInfo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'vehicle_id' => $this->faker->unique()->numberBetween(100000, 999999),
            'vehicle_brand' => $this->faker->randomElement([
                'Toyota', 'Honda', 'Ford', 'Chevrolet', 'Nissan', 'Hyundai', 'Volkswagen', 'Mercedes-Benz', 'BMW', 'Audi', 'Kia', 'Mazda', 'Subaru', 'Jeep', 'Lexus', 'Volvo', 'Tesla', 'Acura', 'Infiniti', 'Porsche'
            ]),
            'year_model' => $this->faker->year,
            'vehicle_type' => $this->faker->randomElement(['SUV', 'Truck','Sedan','Motorcycle']), // Add 'Motorcycle' as an option for vehicle type
            'plate_number' => $this->faker->regexify('[A-Z]{3}-[0-9]{3}'),
            'load_capacity' => $this->faker->randomFloat(2, 300, 3000), // Adjusted range for load capacity based on vehicle type
            'status' => 'available', // Set default status
        ];                            
    }
}
