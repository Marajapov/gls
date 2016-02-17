<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('titleRu');
            $table->text('content');
            $table->text('contentRu');
            $table->string('shortDescription');
            $table->string('shortDescriptionRu');
            $table->integer('channel_id')->nullable()->unsigned()->default(null);
            $table->integer('category_id')->nullable()->unsigned()->default(null);
            $table->integer('owner_id')->nullable()->unsigned()->default(null);
            $table->integer('parentId')->nullable();
            $table->string('thumbnail');
            $table->string('thumbnail_big');
            $table->string('thumb_desc');
            $table->string('thumb_desc_ru');
            $table->string('thumb_author');
            $table->enum('type', ['page', 'post'])->nullable()->default('post');
            $table->boolean('published')->nullable()->default(false);
            $table->boolean('announcement')->nullable()->default(false);
            $table->integer('related1')->nullable()->unsigned()->default(null);
            $table->integer('related2')->nullable()->unsigned()->default(null);
            $table->integer('related3')->nullable()->unsigned()->default(null);
            $table->integer('relatedRu1')->nullable()->unsigned()->default(null);
            $table->integer('relatedRu2')->nullable()->unsigned()->default(null);
            $table->integer('relatedRu3')->nullable()->unsigned()->default(null);
            $table->integer('relatedMedia1')->nullable()->unsigned()->default(null);
            $table->integer('relatedMedia2')->nullable()->unsigned()->default(null);
            $table->integer('relatedMedia3')->nullable()->unsigned()->default(null);
            $table->integer('relatedMediaRu1')->nullable()->unsigned()->default(null);
            $table->integer('relatedMediaRu2')->nullable()->unsigned()->default(null);
            $table->integer('relatedMediaRu3')->nullable()->unsigned()->default(null);
            $table->boolean('general')->nullable()->default(false);
            
            $table->string('director');
            $table->string('fbpost');

            $table->string('ns');
            $table->string('rs');
            $table->string('muzkanal');
            $table->string('kyrgyzradio');
            $table->string('kyrgyzradioProgram');
            $table->string('birinchi');
            $table->string('birinchiProgram');
            $table->string('balastan');
            $table->string('madaniyat');
            $table->string('minkiyal');
            $table->string('dostuk');
            $table->string('dostukProgram');
            
            $table->string('reporter');
            $table->string('extracolumn');

            // Add locally
            $table->string('number');
            $table->string('numberRu');
            $table->string('audio');
            
            $table->smallInteger('viewed')->default(0);
            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('set null');
            $table->foreign('channel_id')->references('id')->on('channels')->onUpdate('cascade')->onDelete('set null');
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
        Schema::drop('posts');
    }
}
