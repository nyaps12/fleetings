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
        Schema::create('lms_g43_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id')->nullable()->default(0);
            $table->integer('order_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('driver_name', 255)->nullable();
            $table->string('shipping_date', 255)->nullable();
            $table->enum('status', ['pending', 'in_transit', 'delivered', 'cancelled'])->default('pending');
            $table->string('route_name');
            $table->string('start_point');
            $table->string('end_point');
            $table->text('waypoints')->nullable();
            $table->double('duration')->nullable();
            $table->double('distance')->nullable();
            $table->double('start_longitude')->nullable();
            $table->double('start_latitude')->nullable();
            $table->double('end_longitude')->nullable();
            $table->double('end_latitude')->nullable();
            $table->text('coordinate_waypoints')->nullable();
            $table->text('avoid_tolls')->default(0);
            $table->text('avoid_highways')->default(0);
            $table->text('avoid_ferries')->default(0);
            $table->text('avoid_indoor')->default(0);
            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schedules');
    }
};
