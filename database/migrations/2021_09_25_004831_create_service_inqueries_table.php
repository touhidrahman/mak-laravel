<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceInqueriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_inqueries', function (Blueprint $table) {
            $table->id();
            $table->string('additional_info');
            $table->string('business_address');
            $table->string('business_name');
            $table->string('client_name');
            $table->string('email');
            $table->string('expected_order_qty')->nullable();
            $table->string('phone');
            $table->string('reply_via');
            $table->string('status');
            $table->string('ref_code');
            $table->longText('note');
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
        Schema::dropIfExists('service_inqueries');
    }
}
