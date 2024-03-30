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
        Schema::create('lms_g47_request_vehicle', function (Blueprint $table) {
            $table->bigIncrements('request_id');
            $table->string('vehicle_id', 20)->nullable();
            $table->timestamp('date_request')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->string('status', 30)->nullable();
        });

        // Insert data
        DB::table('lms_g47_request_vehicle')->insert([
            ['request_id' => 3, 'vehicle_id' => '1', 'date_request' => '2024-03-21 13:35:42', 'status' => 'REQUEST VEHICLE'],
            ['request_id' => 4, 'vehicle_id' => '1</', 'date_request' => '2024-03-21 13:35:50', 'status' => 'DONE'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lms_g47_request_vehicle');
    }
};
