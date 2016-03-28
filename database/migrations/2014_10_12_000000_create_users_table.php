<?php
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('jcm',250);
            $table->string('password', 60);
            $table->string('password2', 60);
            $table->enum('role', ['manager', 'admin'])->nullable()->default('manager');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('users');
    }
}