<?php

namespace Database\Factories;

use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ProductImages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => $this->faker->numberBetween(1, 100),
            'path' => $this->faker->imageUrl(),
            'serial' => $this->faker->numberBetween(1, 10),
        ];
    }
}
