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
        Schema::create('patients', function (Blueprint $table) {
            $table->unsignedBigInteger('fu_id');
            $table->unsignedBigInteger('fs_id');
            $table->unsignedBigInteger('fd_id');
            $table->bigInteger('questions');
            $table->string('job');
            $table->date('last_scan_date');
            $table->string('personal_doctor_name')->nullable();
            $table->string('reason_to_go_hospital')->nullable();
            $table->string('reason_to_transform_blood')->nullable();
            $table->string('reason_to_came');
            $table->string('photo_url');
            $table->foreign('fu_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('fs_id')->references('fu_id')->on('students')->onDelete('cascade');
            $table->foreign('fd_id')->references('fu_id')->on('doctors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
