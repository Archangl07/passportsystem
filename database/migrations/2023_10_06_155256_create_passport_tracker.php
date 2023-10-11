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
        Schema::create('passport_tracker', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->unsignedBigInteger('user_id');

            $table->string('estdelivery');
            $table->string('status');
            $table->string('location');

            $table->timestamps();
            //foreign key
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('passport_tracker');
    }
};
