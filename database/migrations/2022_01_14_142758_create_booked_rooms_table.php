<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookedRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booked_rooms', function (Blueprint $table) {
            $table->increments('booked_room_id');
            $table->string('checkIn', 100);
            $table->string('checkOut', 100);
            $table->string('numOfGuests', 100);
            $table->string('numOfNights', 100);
            $table->string('numOfRooms', 100);
            $table->string('roomCategory', 100);
            $table->string('room_status', 100)->default('Active');
            $table->string('payment_ref', 100);
            $table->string('amount', 100);
            $table->string('payment_status', 100)->default('Unsuccessful');
            $table->string('user_id', 100)->index();
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
        Schema::dropIfExists('booked_rooms');
    }
}
