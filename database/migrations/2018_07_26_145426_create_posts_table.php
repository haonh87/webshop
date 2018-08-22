<?php

use Illuminate\Support\Facades\Schema;
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
            $table->integer('post_categories_id')->unsigned()->nullable();
            $table->foreign('post_categories_id')->references('id')->on('post_categories')->onDelete('cascade');
            $table->string('title',300);
            $table->string('description', 500)->default(null);
            $table->text('content')->nullable()->default(null);
            $table->string('image_url')->nullable()->default(null);
            $table->string('lang_code');
            $table->integer('create_user_id')->unsigned();
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('modified_user_id')->unsigned()->nullable();
            $table->foreign('modified_user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('posts');
    }
}
