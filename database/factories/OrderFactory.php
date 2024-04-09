<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\order;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    protected $model = order::class;

    public function definition()
    {
        return [
            'sender_name' => $this->faker->name,
            'sender_phone' => $this->faker->phoneNumber,
            'sender_address' => $this->faker->address,
            'receiver_name' => $this->faker->name,
            'receiver_phone' => $this->faker->phoneNumber,
            'receiver_address' => $this->faker->address,
            'product' => $this->faker->word,
            'product_price' => $this->faker->randomFloat(2, 10, 500),
            'product_quantity' => $this->faker->numberBetween(1, 10),
            'status' => $this->faker->randomElement(['preparing', 'shipped', 'out for delivery', 'received', 'cancel']),
            'warehouse' => $this->faker->randomElement(['Warehouse A', 'Warehouse B', 'Warehouse C']),
        ];
    }
}