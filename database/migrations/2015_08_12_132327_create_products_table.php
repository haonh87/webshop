<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');

            $table->string('lang_code');
            $table->integer('category_id')->unsigned();
            $table->string('model_ids')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('product_color_ids')->nullable();
            $table->float('price');
            $table->string('description', 350)->nullable();
            $table->text('content')->nullable();
            $table->integer('sell_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->boolean('is_out_of_stock')->default(false);
            $table->integer('create_user_id')->unsigned();
            $table->foreign('create_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('modified_user_id')->unsigned()->nullable();
            $table->foreign('modified_user_id')->references('id')->on('users')->onDelete('cascade');
            $table->tinyInteger('status')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE products ADD FULLTEXT search(name, description)');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function($table) {
            $table->dropIndex('search');
        });
        Schema::drop('products');
    }
}
