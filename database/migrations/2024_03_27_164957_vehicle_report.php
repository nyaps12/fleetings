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
        Schema::create('vehicle_report', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->decimal('maintenance_cost', 10, 2)->nullable();
            $table->string('maintenance_receipt')->nullable();
            $table->string('vehicle_type');
            $table->string('vehicle_engine_no');
            $table->string('vehicle_condition');
            $table->string('vehicle_odometer');
            $table->text('vehicle_issues');
            $table->string('action');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_report');
    }
};
