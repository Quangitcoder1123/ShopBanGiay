<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('categories', function (Blueprint $table) {
            $table->unsignedInteger('cate_id')->autoIncrement();
            $table->string('cate_name');
            $table->text('cate_desc')->nullable();
            $table->text('cate_logo')->nullable();
            $table->text('cate_image')->nullable();
            $table->integer('parent_id')->unsigned()->nullable();
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
        Schema::dropIfExists('categories');
        Schema::enableForeignKeyConstraints();
    }
}
