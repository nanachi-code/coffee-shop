<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSize extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('size', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger("product_id");
            $table->string('name');
            $table->string('price');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('size');
    }
}
