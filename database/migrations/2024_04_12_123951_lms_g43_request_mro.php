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
        Schema::create('lms_g43_request_mro', function (Blueprint $table) {
        $table->id();
        $table->date('date'); // For the date input
        $table->string('product'); // For the product input
        $table->integer('quantity'); // For the quantity input
        $table->timestamps(); // 
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lms_g43_request_mro');
    }
};
