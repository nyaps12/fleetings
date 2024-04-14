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
        Schema::create('lms_g43_operators', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('vehicle_id')->nullable();
            $table->string('vehicles_id')->nullable();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('vehicle_brand')->nullable();
            $table->string('plate_number')->nullable();
            $table->string('vehicle_type')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->string('phone')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        
            // Optionally, add foreign key constraints if needed
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('vehicle_id')->references('id')->on('vehicle_info')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('operators');
    }
};
