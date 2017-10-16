<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('prices')) {
        Schema::create('prices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('category_id');
            $table->string('product_id');
            $table->string('dimension_id')->nullable;
            $table->integer('price');
            $table->integer('discount')->nullable;
            $table->timestamps();
        });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prices');
    }
}
