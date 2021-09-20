<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->nullable();
            $table->foreignId('subcategory_id')->nullable();
            $table->foreignId('subsubcategory_id')->nullable();
            $table->foreignId('product_familiy_id')->nullable();
            $table->string('name');
            $table->string('brand');
            $table->string('season');
            $table->string('material');
            $table->string('slug')->unique();
            $table->string('code')->nullable();
            $table->string('tags')->nullable();
            $table->string('thumb_1')->nullable();
            $table->string('thumb_2')->nullable();
            $table->integer('selling_price');
            $table->integer('discounted_price')->nullable();
            $table->boolean('active')->default(false);
            $table->longText('description');
            $table->text('seo_text');
            $table->timestamp('new_arrival_until')->default(Carbon::now()->addMonth());
            $table->timestamp('special_offer_until')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
