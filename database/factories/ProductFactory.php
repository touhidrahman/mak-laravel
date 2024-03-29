<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

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
            'season' => $this->faker->word(),
            'material' => $this->faker->word(),
            'slug' => $this->faker->slug(),
            'sku' => Str::random(10),
            'tags' => $this->faker->word(),
            'thumb_1' => $this->faker->imageUrl(),
            'thumb_2' => $this->faker->imageUrl(),
            'dimension' => $this->faker->numberBetween(1, 100) . 'x' . $this->faker->numberBetween(1, 100). 'cm',
            'weight' => $this->faker->numberBetween(1, 10) . 'kg',
            'category_id' => $this->faker->numberBetween(1, 6),
            'subcategory_id' => $this->faker->numberBetween(1, 20),
            'subsubcategory_id' => $this->faker->numberBetween(1, 50),
            'selling_price' => $this->faker->numberBetween(1, 10000),
            'discounted_price' => $this->faker->numberBetween(0, 10000),
            'active' => $this->faker->boolean(),
            'description' => $this->faker->paragraph(),
            'seo_text' => $this->faker->paragraph(),
            'new_arrival_until' => $this->faker->date(),
            'special_offer_until' => $this->faker->date(),
            'published_at' => $this->faker->date(),
        ];
    }
}
