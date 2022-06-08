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
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->integer('pro_category_id');
            $table->integer('brand_id');
            $table->string('product_name');
            $table->string('product_price');
            $table->string('product_discount_price')->nullable();
            $table->integer('product_quantity');
            $table->string('product_unit')->nullable();
            $table->text('product_detils')->nullable();
            $table->longtext('product_description')->nullable();
            $table->string('product_image')->nullable();
            $table->text('product_gallery')->nullable();
            $table->integer('product_order')->nullable();
            $table->integer('product_feature')->default(0);
            $table->integer('product_creator');
            $table->integer('product_editor')->nullable();
            $table->string('product_slug');
            $table->integer('product_status')->default(1);
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
        Schema::dropIfExists('products');
    }
}
