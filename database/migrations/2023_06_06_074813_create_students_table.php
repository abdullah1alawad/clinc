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
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id');
            $table->string('university_id')->unique();
            $table->tinyInteger('level');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
//            $tableable->double('bts');
            $table->tinyInteger('semester');
            $table->timestamps();
            //$table->foreign('owner_id')->references('id')->on('owners')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
