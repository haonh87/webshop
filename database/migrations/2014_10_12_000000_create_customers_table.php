<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('avatar', 250)->nullable()->default(null);
            $table->string('address');
            $table->string('address2')->nullable()->default(null);
            $table->string('phone');
            $table->string('mobile');
            $table->integer('gender');
            $table->date('birthday');
            $table->integer('user_id')->unsigned();
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
        Schema::drop('customers');
    }
}
