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
        Schema::create('maintenance_schedule', function (Blueprint $table) {
            $table->id('report_id');
            $table->string('vehicle_type', 50);
            $table->string('engine_no', 50);
            $table->text('issues');
            $table->string('status', 20);
            $table->date('date_issue');
            $table->integer('vehicle_odometer');
            $table->date('start_date');
            $table->date('completion_date')->nullable();
            $table->timestamps(); // Adds created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
