<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKilogramForLineKilogramLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kilogram_product', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('kilogram_id')->unsigned();
            $table->integer('product_id')->unsigned();
            $table->timestamps();

            

            $table->foreign('kilograms_id')->references('id')->on('kilograms');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kilogramForLine_kilogram_line');
    }
}
