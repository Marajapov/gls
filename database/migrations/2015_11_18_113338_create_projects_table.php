<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('nameRu');
            $table->boolean('published')->nullable()->default(false);
            $table->string('parentId');
            $table->text('description');
            $table->text('descriptionRu');
            $table->string('thumbnail');
            $table->string('status');

            $table->string('director');
            $table->string('ns');
            $table->string('rs');
            $table->string('muzkanal');
            $table->string('kyrgyzradio');
            $table->string('birinchi');
            $table->string('balastan');
            $table->string('madaniyat');
            $table->string('minkiyal');
            $table->string('dostuk');
            $table->string('extracolumn');
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
        Schema::table('projects', function (Blueprint $table) {
            Schema::drop('projects');
        });
    }
}

