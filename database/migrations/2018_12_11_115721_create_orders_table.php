<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('number');
            $table->integer('status_id')->unsigned()->default('1');
            $table->foreign('status_id')->references('id')->on('status')->onUpdate('cascade')->onDelete('cascade')->nullable();
            $table->string('name');
            $table->string('surname');
            $table->string('patronymic');
            $table->string('tel');
            $table->string('country');
            $table->string('city');
            $table->string('street');
            $table->string('house');
            $table->string('apartment');
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
        Schema::dropIfExists('orders');
    }
}
