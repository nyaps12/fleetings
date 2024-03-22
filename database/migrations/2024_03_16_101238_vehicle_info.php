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
        Schema::create('vehicle_info', function (Blueprint $table) {
            $table->id();
            $table->string('vehicle_id')->unique(); // Ensure vehicle IDs are unique
            $table->string('vehicle_brand');
            $table->string('year_model');
            $table->string('vehicle_type');
            $table->string('plate_number');
            $table->string('load_capacity');
            $table->enum('status', ['available', 'unavailable'])->default('available');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        
            // Optionally, add foreign key constraints if needed
            // $table->foreign('vehicle_id')->references('id')->on('operators')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicle_info');
    }
};
