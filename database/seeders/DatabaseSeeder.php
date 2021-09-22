<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Color::factory(20)->create();
        \App\Models\Category::factory(3)->create();
        \App\Models\Subcategory::factory(20)->create();
        \App\Models\Subsubcategory::factory(50)->create();
        \App\Models\Product::factory(100)->create();
        \App\Models\ProductImages::factory(1000)->create();
        \App\Models\Stock::factory(1000)->create();
    }
}
