<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Subsubcategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubsubcategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Subsubcategory::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word(),
            'category_id' => $this->faker->numberBetween(1, 6),
            'subcategory_id' => $this->faker->numberBetween(1, 20),
        ];
    }
}
