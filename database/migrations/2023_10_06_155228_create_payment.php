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
        Schema::create('payment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_id')->unique();
            $table->unsignedBigInteger('user_id');

            $table->string('pay_option');
            $table->date('pay_date');
            $table->decimal('price');
            $table->boolean('payment_completed')->default(0);

            $table->timestamps();

            //foreign key
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('app_id')->references('id')->on('application');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment');
    }
};
