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
        Schema::create('student_marks', function (Blueprint $table) {
            $table->unsignedBigInteger('fs_id');
            $table->unsignedBigInteger('f_subject_id');
            $table->unsignedBigInteger('mark');
            $table->foreign('fs_id')->references('fu_id')->on('students')->onDelete('cascade');
            $table->foreign('f_subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_marks');
    }
};
