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
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('student_user_id');
            $table->unsignedBigInteger('doctor_user_id');
            $table->bigInteger('questions');
            $table->string('job');
            $table->date('last_scan_date');
            $table->string('personal_doctor_name')->nullable();
            $table->string('reason_to_go_hospital')->nullable();
            $table->string('reason_to_transform_blood')->nullable();
            $table->string('reason_to_came');
            $table->string('url');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('student_user_id')->references('user_id')->on('students')->onDelete('cascade');
            $table->foreign('doctor_user_id')->references('user_id')->on('doctors')->onDelete('cascade');
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
