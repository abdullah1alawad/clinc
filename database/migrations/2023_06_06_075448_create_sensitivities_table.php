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
        Schema::create('sensitivities', function (Blueprint $table) {
            $table->unsignedBigInteger('emergency_id');
            $table->string('sensitivity_name');
            $table->foreign('emergency_id')->references('user_id')->on('emergency')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sensitivities');
    }
};
