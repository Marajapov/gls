<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('client_phone');
            $table->string('client_adres');
            $table->string('description');
            $table->enum('status', ['new', 'sent','complete','canceled','closed'])->nullable()->default('new');

            $table->integer('subcategory_id')->nullable()->unsigned()->default(null);
            $table->integer('owner_id')->nullable()->unsigned()->default(null);

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
        Schema::drop('orders');
    }
}
