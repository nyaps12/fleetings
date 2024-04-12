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
        Schema::create('lms_g43_vehicle_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->date('date');
            $table->decimal('maintenance_cost', 10, 2)->nullable();
            $table->string('maintenance_receipt')->nullable();
            $table->string('vehicle_type');
            $table->string('vehicle_engine_no');
            $table->string('vehicle_condition');
            $table->decimal('vehicle_odometer', 10, 2);
            $table->text('vehicle_issues');
            $table->timestamps();
        
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('vehicle_id')->references('id')->on('vehicles')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lms_g43_vehicle_report');
    }
};
