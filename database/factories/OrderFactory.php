<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Order::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 11),
            'price' => $this->faker->numberBetween(1, 9999),
            'paid_at' => $this->faker->date(),
            'status' => ['NOT_PAID_YET', 'CREATED'][random_int(0, 1)],
        ];
    }
}
