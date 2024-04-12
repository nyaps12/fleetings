<?php

namespace Database\Factories;

use App\Models\lms_g43_Restriction;
use Illuminate\Database\Eloquent\Factories\Factory;

class RestrictionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = lms_g43_Restriction::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'codes' => $this->faker->randomLetter(),
            'name' => $this->faker->sentence(),
            // Add more attributes and their corresponding fake data here
        ];
    }
}
