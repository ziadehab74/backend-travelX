<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('Hotel_name');
            $table->foreignId('city_id')->references('id')->on('cities');
            $table->double('Total_price');
            $table->integer('rating');
            $table->string('type');
            $table->string('facilities');
            $table->string('owner_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('phone_number');
            $table->integer('number_of_rooms');
            $table->integer('location_id')->nullable();
            $table->string('image')->nullable();
            $table->string('application_documents')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hotels');
    }
};
