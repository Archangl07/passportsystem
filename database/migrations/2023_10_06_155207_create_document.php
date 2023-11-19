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
            $table->id()->primary();
            $table->unsignedBigInteger('user_id');

            $table->string('birth_certificate')->nullable();
            $table->string('NIC')->nullable();
            $table->string('Medical_certificate')->nullable();
            $table->string('Fingerprint')->nullable();
            $table->string('Digitalphoto')->nullable();
            $table->timestamps();

            // Define foreign key constraints
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
