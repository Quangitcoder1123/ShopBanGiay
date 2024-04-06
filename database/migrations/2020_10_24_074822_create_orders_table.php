<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedInteger('order_id')->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->string('order_name');
            $table->string('order_phone');
            $table->string('order_city');
            $table->string('order_district');
            $table->string('order_ward');
            $table->string('order_address');
            $table->string('order_total');
            $table->integer('order_qty');
            $table->tinyInteger('ship_method');
            $table->tinyInteger('pay_method');
            $table->text('bill_image')->nullable();
            $table->tinyInteger('order_status')->default(0);
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
        Schema::enableForeignKeyConstraints();
    }
}
