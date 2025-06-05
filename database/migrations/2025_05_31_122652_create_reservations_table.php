<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::dropIfExists('reservations');
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id');
            $table->foreign('vehicle_id')->references('id')->on('vehicles');
            $table->longText('confirm_number');
            $table->dateTime('pickup');
            $table->dateTime('dropoff');
            $table->string('age');
            $table->unsignedBigInteger('status');
            $table->foreign('status')->references('id')->on('statuses');
            $table->string('name');
            $table->string('number');
            $table->string('email');
            $table->string('opt_protection')->nullable();
            $table->string('equipment')->nullable();
            $table->string('license_number');
            $table->string('issuing_state');
            $table->date('exp_date');
            $table->date('issue_date');
            $table->date('dob');
            $table->string('country');
            $table->string('state');
            $table->string('city');
            $table->string('street_address');
            $table->string('street_address_2')->nullable();
            $table->string('zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
