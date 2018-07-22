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
            $table->integer('model_id');
            $table->foreign('model_id')->references('id')->on('models')->onDelete('cascade');
            $table->string('lang_code');
            $table->foreign('lang_code')->references('code')->on('languages')->onDelete('cascade');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('product_color_ids')->nullable();
            $table->float('price');
            $table->string('description', 350)->nullable();
            $table->text('content')->nullable();
            $table->integer('sell_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->boolean('is_out_of_stock')->default(false);
            $table->tinyInteger('status');
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
