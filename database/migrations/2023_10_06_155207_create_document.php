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
        Schema::create('document', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('report_id');
            $table->unsignedBigInteger('user_id');

            $table->binary('birth_certificate')->nullable();
            $table->binary('NIC')->nullable();
            $table->binary('Medical_certificate')->nullable();
            $table->binary('Fingerprint')->nullable();
            $table->binary('Digitalphoto')->nullable();
            $table->timestamps();

            // Define foreign key constraints
            $table->foreign('report_id')->references('id')->on('policereport');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document');
    }
};
