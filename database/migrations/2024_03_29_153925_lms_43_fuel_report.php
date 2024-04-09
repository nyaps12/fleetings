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
        Schema::create('lms_g43_fuel_report', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('profile_photo_path', 2048)->nullable();
            $table->date('date');
            $table->decimal('price_per_liter', 8, 2);
            $table->decimal('liters', 8, 2);
            $table->decimal('total_cost', 10, 2);
            $table->unsignedBigInteger('vehicle_odometer');
            $table->string('fuel_type');
            $table->string('fuel_brand');
            $table->string('fuel_receipt')->nullable(); // Assuming the receipt image is optional
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
        Schema::dropIfExists('fuel_report');
    }
};
