<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProChillImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('pro_chill_images', function (Blueprint $table) {
            $table->unsignedInteger('chill_id')->autoIncrement();
            $table->unsignedInteger('pro_id');
            $table->text('chill_image')->nullable();
            $table->foreign('pro_id')->references('pro_id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('pro_chill_images');
        Schema::enableForeignKeyConstraints();
    }
}
