<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('custom_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('website');
            $table->string('password');

            $table->integer('address')->unsigned()->nullable();
            $table->integer('company')->unsigned()->nullable();

            $table->timestamps();
        });

        Schema::table('custom_users', function(Blueprint $table)
        {
            $table->foreign('address')->references('id')->on('users_address')->onDelete('cascade');
            $table->foreign('company')->references('id')->on('users_companies')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('custom_users');
    }
}
