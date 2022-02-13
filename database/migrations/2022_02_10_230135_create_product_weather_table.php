<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_weather', function (Blueprint $table) {
            $table->primary(['weather_id', 'product_id']);
            $table->unsignedBigInteger('product_id');
            $table->unsignedTinyInteger('weather_id');

            $table->foreign('product_id')->references('id')->on('products')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('weather_id')->references('id')->on('weather')
                ->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_weather');
    }
};
