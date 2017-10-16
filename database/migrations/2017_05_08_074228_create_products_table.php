<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('products')){
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id');
            $table->string('name');
            $table->text('description');
            $table->text('text');
            $table->string('image')->nullable();           
            $table->string('type')->nullable();
            $table->integer('height_id')->nullable();
            $table->string('dimension_id')->nullable();
            $table->integer('color_id')->nullable();
            $table->integer('foam_id')->nullable();
            $table->integer('sticker_id')->nullable();
             $table->integer('visible')->default(0);
            $table->integer('deleted')->default(0);
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
        Schema::dropIfExists('products');
    }
}
