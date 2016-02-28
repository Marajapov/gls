<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrderSubcategoryTies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_subcategory_ties', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('count');
            $table->integer('price');
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
        Schema::drop('order_subcategory_ties');
    }
}
