<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name');
            $table->string('brand');
            $table->string('season');
            $table->string('material');
            $table->string('slug')->unique();
            $table->string('code');
            $table->string('tags');
            $table->string('size');
            $table->string('color');
            $table->string('thumb_1');
            $table->string('thumb_2');
            $table->integer('selling_price');
            $table->integer('discount_price');
            $table->foreignId('category_id');
            $table->foreignId('subcategory_id');
            $table->foreignId('subsubcategory_id');
            $table->boolean('status');
            $table->longText('description');
            $table->text('seo_text');
            $table->timestamp('new_arrival_until');
            $table->timestamp('special_offer_until');
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
