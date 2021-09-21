<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;

class StockFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Stock::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'sku' => $this->faker->string(5),
            'size' => $this->faker->string(1),
            'color_id' => $this->faker->numberBetween(1, 20),
            'qty' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
