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
        Schema::create('emergency', function (Blueprint $table) {
            $table->unsignedBigInteger('fu_id');
            $table->string('spare_phone_number')->unique();
            $table->string('home_number')->unique();
            $table->string('blood_type');
            $table->unsignedBigInteger('height');
            $table->unsignedBigInteger('weight');
            $table->foreign('fu_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency');
    }
};
