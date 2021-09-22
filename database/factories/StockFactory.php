<?php

namespace Database\Factories;

use App\Models\Stock;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $sizes = ['XS', 'S', 'M', 'L', 'XL', 'XXL'];
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'sku' => Str::random(10),
            'size' => $sizes[$this->faker->numberBetween(0, 5)],
            'color_id' => $this->faker->numberBetween(1, 20),
            'qty' => $this->faker->numberBetween(1, 1000),
        ];
    }
}
