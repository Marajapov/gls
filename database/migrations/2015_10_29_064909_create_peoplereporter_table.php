<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeoplereporterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people_reporter', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nameRu');
            $table->text('content');
            $table->text('contentRu');
            $table->binary('thumbnail');
            $table->string('video');
            $table->boolean('published')->nullable()->default(false);
            $table->smallInteger('viewed')->default(0);
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
        Schema::drop('people_reporter');
    }
}
