<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotalsDeatilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotals_deatils', function (Blueprint $table) {
            $table->id();
            $table->string('lead_id');
            $table->unsignedBigInteger('state_id');
            $table->unsignedBigInteger('city_id');
            $table->string("hotel_id");
            $table->string("HotelOptionNumber");
            $table->string('hotal_room_type')->nullable();
            $table->string('star_ratings')->nullable();
            $table->string('hotal_night')->nullable();
            $table->foreign('state_id')->references('id')->on('states');
            $table->foreign('city_id')->references('id')->on('cities');
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
        Schema::dropIfExists('hotals_deatils');
    }
}
