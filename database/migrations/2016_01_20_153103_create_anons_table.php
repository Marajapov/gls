<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anons', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('channel');
            $table->string('name');
            $table->string('nameRu');
            $table->string('thumbnail');
            $table->string('weekday');
            $table->string('weekdayRu');
            $table->string('time');
            $table->string('url');
            $table->integer('project');
            $table->integer('media');
            $table->integer('published');
            $table->integer('owner_id');
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
        Schema::drop('anons');
    }
}
