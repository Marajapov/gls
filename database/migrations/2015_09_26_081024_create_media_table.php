<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('resource_id')->nullable()->unsigned()->default(null);
            $table->string('videoType')->nullable()->default(null);
            $table->string('name');
            $table->text('description');
            $table->string('url');
            $table->string('nameRu');
            $table->enum('type', ['image', 'video'])->nullable()->default('image');
            $table->integer('owner_id')->nullable()->unsigned()->default(null);
            $table->boolean('published')->nullable()->default(false);
            $table->smallInteger('viewed')->default(0);
            $table->boolean('dayVideo')->nullable()->default(false);
            $table->string('video1',500);
            $table->string('video2',500);
            $table->string('video3',500);
            $table->string('video4',500);
            $table->string('status',500);
            
            $table->string('director');
            $table->string('ns');
            $table->string('rs');
            $table->string('muzkanal');
            $table->string('promo');
            $table->integer('hitnumber');
            $table->string('thumbnail');
            $table->string('thumbnail_big');
            $table->string('muzkanalanons1');
            $table->string('muzkanalanons2');
            $table->string('muzkanalanons3');
            $table->string('exclusive');
            $table->string('concert');
            $table->string('anonstime1');
            $table->string('anonstime2');
            $table->string('anonstime3');
            $table->string('kyrgyzradio');
            $table->string('birinchi');
            $table->string('balastan');
            $table->string('madaniyat');
            $table->string('minkiyal');
            $table->string('dostuk');
            $table->string('extracolumn');

            $table->string('program');
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('medias');
    }
}
