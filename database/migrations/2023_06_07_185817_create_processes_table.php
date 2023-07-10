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
        Schema::create('processes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_user_id');
            $table->unsignedBigInteger('doctor_user_id');
            $table->unsignedBigInteger('patient_user_id');
            $table->unsignedBigInteger('assistant_user_id');
            $table->unsignedBigInteger('chair_id');
            $table->unsignedBigInteger('subject_id');
            $table->tinyInteger('level');
            $table->tinyInteger('semester');
            $table->string('url')->nullable();
            $table->foreign('student_user_id')->references('user_id')->on('students')->onDelete('cascade');
            $table->foreign('doctor_user_id')->references('user_id')->on('doctors')->onDelete('cascade');
            $table->foreign('patient_user_id')->references('user_id')->on('patients')->onDelete('cascade');
            $table->foreign('assistant_user_id')->references('user_id')->on('assistants')->onDelete('cascade');
            $table->foreign('chair_id')->references('id')->on('chairs')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('processes');
    }
};
