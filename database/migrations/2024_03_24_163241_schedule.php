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
        Schema::create('schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schedule_id')->nullable()->default(0);
            $table->integer('order_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('driver_name', 255)->nullable();
            $table->string('shipping_date', 255)->nullable();
            $table->string('route_name', 255)->nullable();
            $table->string('start_point', 255)->nullable();
            $table->string('end_point', 255)->nullable();
            $table->text('waypoints')->nullable();
            $table->enum('status', ['pending', 'in_transit', 'delivered', 'cancelled'])->default('pending');
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
