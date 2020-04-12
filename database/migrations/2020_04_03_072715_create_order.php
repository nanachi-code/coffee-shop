<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_address');
            $table->string('customer_city');
            $table->string('customer_country');
            $table->string('customer_email');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_postcode');
            $table->string('method');
            $table->unsignedTinyInteger('status');
            $table->decimal('total', 12, 4);
            $table->timestamps();
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
