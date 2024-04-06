<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('checkouts', function (Blueprint $table) {
            $table->unsignedInteger('check_id')->autoIncrement();
            $table->unsignedInteger('order_id');
            $table->unsignedInteger('pro_id');
            $table->integer('quantity');
            $table->integer('total_price');
            $table->timestamps();
            $table->foreign('order_id')->references('order_id')->on('orders')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('checkouts');
        Schema::enableForeignKeyConstraints();
    }
}
