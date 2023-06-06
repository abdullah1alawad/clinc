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
        Schema::create('chair_process', function (Blueprint $table) {
            $table->unsignedBigInteger('fpro_id');
            $table->unsignedBigInteger('fc_id');
            $table->date('date');
            $table->foreign('fpro_id')->references('id')->on('processes')->onDelete('cascade');
            $table->foreign('fc_id')->references('id')->on('chairs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chair_process');
    }
};
