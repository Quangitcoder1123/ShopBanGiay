<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('reviews', function (Blueprint $table) {
            $table->unsignedInteger('rev_id')->autoIncrement();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('pro_id');
            $table->text('comment');
            $table->tinyInteger('rate')->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('pro_id')->references('pro_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('reviews');
        Schema::enableForeignKeyConstraints();
    }
}
