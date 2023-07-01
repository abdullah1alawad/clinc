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
        Schema::create('doctor_certificates', function (Blueprint $table) {
            $table->unsignedBigInteger('fd_id');
            $table->string('certificates_name');
            $table->string('photo');
            $table->foreign('fd_id')->references('fu_id')->on('doctors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor_certificates');
    }
};
