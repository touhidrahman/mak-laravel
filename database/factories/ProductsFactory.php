<?php

namespace Database\Factories;

use App\Models\Model;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Model::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'brand' => $this->faker->word(),
            'brand' => $this->faker->word(),
            'material' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'code' => $this->faker->word(),
            'tags' => $this->faker->words(),
        ];
    }
}
