<?php

namespace Database\Factories;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderItemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderItem::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'order_id' => $this->faker->numberBetween(1, 100),
            'product_id' => $this->faker->numberBetween(1, 100),
            'stock_id' => $this->faker->numberBetween(1, 500),
            'qty' => $this->faker->numberBetween(1, 5),
            'unit_price' => $this->faker->numberBetween(1, 9999),
        ];
    }
}
