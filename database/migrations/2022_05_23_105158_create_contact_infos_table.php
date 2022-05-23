<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_infos', function (Blueprint $table) {
            $table->bigIncrements('contact_id');
            $table->string('contact_phone_one', 25)->nullable();
            $table->string('contact_phone_two', 25)->nullable();
            $table->string('contact_email_one', 50)->nullable();
            $table->string('contact_email_two', 50)->nullable();
            $table->text('contact_address_one')->nullable();
            $table->text('contact_address_two')->nullable();
            $table->integer('contact_status')->default(1);
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
        Schema::dropIfExists('contact_infos');
    }
}
