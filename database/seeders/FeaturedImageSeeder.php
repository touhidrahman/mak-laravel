<?php

namespace Database\Seeders;

use App\Models\FeaturedImage;
use Illuminate\Database\Seeder;

class FeaturedImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FeaturedImage::factory(5)->create();
    }
}
