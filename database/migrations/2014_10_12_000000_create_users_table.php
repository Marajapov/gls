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
            $table->string('phone')->unique();
            $table->string('gcm',250);
            $table->string('password', 60);
            $table->string('password2', 60);
            $table->boolean('flag')->nullable()->default(false);
            $table->enum('role', ['manager','admin','doer','softDelete'])->nullable()->default('doer');
            $table->enum('status', ['active','blocked'])->nullable()->default('active');
            $table->rememberToken();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('users');
    }
}