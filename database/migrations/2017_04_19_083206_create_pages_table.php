<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('pages')){
        Schema::create('pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('text');
            $table->string('seo_title');
            $table->text('seo_description')->nullable();
            $table->text('seo_keywords')->nullable();
            $table->string('image')->nullable();
            $table->integer('visible')->default(0);
            $table->integer('deleted')->default(0);
            $table->integer('contact_form')->default(0);
            $table->string('layout');
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
        Schema::dropIfExists('pages');
    }
}
