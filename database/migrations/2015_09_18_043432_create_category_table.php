<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('description');
            $table->string('status');

            $table->boolean('published')->nullable()->default(false);
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('categories');
    }
}
