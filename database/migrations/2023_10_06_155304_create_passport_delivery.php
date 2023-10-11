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
        Schema::create('passport_delivery', function (Blueprint $table) {
            $table->string('id')->primary();


            $table->string('tracking_id');
            $table->string('delivery_address');
            $table->string('recepient_name');
            $table->string('delivery_date');

            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('tracking_id')->references('id')->on('passport_tracker');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passport_delivery');
    }
};
