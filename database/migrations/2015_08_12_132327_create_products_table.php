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
            $table->string('artice_id')->unique();
            $table->string('name_en');
            $table->string('name_ru');
            $table->string('model');
            $table->integer('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->integer('silk_id')->unsigned();
            $table->foreign('silk_id')->references('id')->on('silks')->onDelete('cascade');
            $table->float('price');
            $table->string('country_en')->nullable();
            $table->string('country_ru')->nullable();
            $table->text('description_en')->nullable();
            $table->text('description_ru')->nullable();
            $table->integer('sell_count')->default(0);
            $table->integer('view_count')->default(0);
            $table->string('status_en');
            $table->string('status_ru');
            $table->softDeletes();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE products ADD FULLTEXT search(name_en, name_ru, description_en, description_ru)');

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
