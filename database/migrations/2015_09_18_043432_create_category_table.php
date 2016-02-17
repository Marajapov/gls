<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('titleRu');

            $table->string('general');
            $table->string('ns');
            $table->string('rs');
            $table->string('muzkanal');
            $table->string('kyrgyzradio');
            $table->string('birinchi');
            $table->string('balastan');
            $table->string('madaniyat');
            $table->string('minkiyal');
            $table->string('dostuk');

            $table->string('description', 500);
            $table->string('descriptionRu', 500);
            $table->smallInteger('order')->nullable()->default(0);
            $table->integer('orderBirinchi');
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
        Schema::drop('categories');
    }
}
