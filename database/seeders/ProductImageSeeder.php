<?php

namespace Database\Seeders;

use App\Models\ProductImages;
use Illuminate\Database\Seeder;

class ProductImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProductImages::factory(1000)->create();
    }
}
