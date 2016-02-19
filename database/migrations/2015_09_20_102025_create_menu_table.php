<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateMenuTable extends Migration
{
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->nullable()->unsigned()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->string('name')->nullable()->default(null);
            $table->string('nameRu')->nullable()->default(null);
            $table->string('url', 500)->nullable()->default(null);
            $table->smallInteger('order')->nullable()->unsigned()->default(0);
            $table->boolean('newtab')->nullable()->default(false);
            $table->timestamps();
            $table->foreign('parent_id')->references('id')->on('menus')->onUpdate('cascade')->onDelete('set null');
        });
    }
    public function down()
    {
        Schema::drop('menus');
    }
}