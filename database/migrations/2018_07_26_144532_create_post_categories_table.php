<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->string('name');
            $table->text('description');
            $table->string('image_url', 250)->nullable()->defaut(null);
            $table->string('lang_code');
            $table->integer('create_user_id')->unsigned();
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('modified_user_id')->unsigned()->nullable();
            $table->foreign('modified_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::dropIfExists('post_categories');
    }
}
