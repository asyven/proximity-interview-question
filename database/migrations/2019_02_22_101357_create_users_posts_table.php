<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('customUser')->unsigned()->nullable();
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });

        Schema::table('users_posts', function(Blueprint $table)
        {
            $table->foreign('customUser')->references('id')->on('custom_users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_posts');
    }
}
