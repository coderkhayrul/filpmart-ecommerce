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
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('pro_cat_id');
            $table->string('pro_cat_name');
            $table->string('pro_cat_parent')->nullable();
            $table->integer('pro_cat_order')->nullable();
            $table->string('pro_cat_image')->nullable();
            $table->string('pro_cat_icon')->nullable();
            $table->string('pro_cat_slug');
            $table->integer('pro_cat_status')->default(1);
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
        Schema::dropIfExists('categories');
    }
}
