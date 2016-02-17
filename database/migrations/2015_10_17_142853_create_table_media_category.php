<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMediaCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media_category', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nameRu');
            $table->string('title');
            $table->string('titleRu');
            $table->string('description', 500);
            $table->string('descriptionRu', 500);
            $table->string('videoType', 200);
            $table->smallInteger('order')->nullable()->default(0);
            $table->boolean('published')->nullable()->default(false);
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
        Schema::drop('media_category');
    }
}
