<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('products', function (Blueprint $table) {
            $table->unsignedInteger('pro_id')->autoIncrement();
            $table->unsignedInteger('cate_id');
            $table->string('pro_name');
            $table->string('pro_image')->nullable();
            $table->text('pro_desc')->nullable();
            $table->integer('view')->default(0);
            $table->integer('quantity')->default(0);
            $table->integer('pro_old_price')->nullable();
            $table->integer('pro_new_price')->nullable();
            $table->boolean('pro_sale')->default(0);
            $table->foreign('cate_id')->references('cate_id')->on('categories')->onDelete('cascade');
            $table->timestamps();
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
        Schema::dropIfExists('products');
        Schema::enableForeignKeyConstraints();
    }
}
