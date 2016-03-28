<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('client_adres');
            $table->text('description');
            $table->string('attachment');
            $table->string('url');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('count');
            $table->integer('price');
            $table->integer('priceClient');
            $table->string('flag');
            $table->enum('status', ['site','new', 'share','complete','canceled','closed','softDelete'])->nullable()->default('site');
            $table->integer('owner_id')->nullable()->unsigned()->default(null);

            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('set null');
        });
    }
    public function down()
    {
        Schema::drop('orders');
    }
}
