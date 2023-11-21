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
            $table->id()->primary();
            $table->unsignedBigInteger('application_id');

            $table->date('estdelivery');
            $table->string('status');
            $table->string('location');

            $table->timestamps();
            //foreign key
            $table->foreign('application_id')->references('id')->on('application');

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
