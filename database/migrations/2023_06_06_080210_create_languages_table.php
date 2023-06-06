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
        Schema::create('languages', function (Blueprint $table) {
            $table->unsignedBigInteger('fd_id')->nullable();
            $table->unsignedBigInteger('fa_id')->nullable();
            $table->string('language_name');
            $table->foreign('fd_id')->references('fu_id')->on('doctors')->onDelete('cascade');
            $table->foreign('fa_id')->references('fu_id')->on('assistants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('languages');
    }
};
