<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('lms_g43_incidents_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->string('name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('vehicle');
            $table->string('vehicle_engine_no');
            $table->date('incident_date');
            $table->time('incident_time');
            $table->string('other_name')->nullable();
            $table->string('number')->nullable();
            $table->string('other_address')->nullable();
            $table->string('incident_location');
            $table->text('incident_description');
            $table->string('incident_photo', 2048)->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('incidents');
    }
};
