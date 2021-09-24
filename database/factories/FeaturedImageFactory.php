<?php

namespace Database\Factories;

use App\Models\FeaturedImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class FeaturedImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeaturedImage::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'title_color' => Arr::random(['dark', 'light']),
            'image_url' => $this->faker->imageUrl(),
            'page_path' => $this->faker->slug(),
            'button_label' => 'Shop now',
        ];
    }
}
