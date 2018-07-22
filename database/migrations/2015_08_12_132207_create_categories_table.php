<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('categories')) {
            Schema::create('categories', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('parent_id')->default(null);
                $table->string('name');
                $table->text('description')->nullable();
                $table->string('image_url', 250)->nullable();
                $table->string('lang_code', 5);
                $table->foreign('lang_code')->references('code')->on('languages')->onDelete('cascade');
                $table->integer('create_user_id');
                $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');
                $table->integer('modified_user_id')->nullable()->default(null);
                $table->foreign('modified_user_id')->references('id')->on('users')->onDelete('cascade');
                $table->softDeletes();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('categories');
    }
}
