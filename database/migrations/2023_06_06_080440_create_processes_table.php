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
            $table->unsignedBigInteger('fs_id');
            $table->unsignedBigInteger('fd_id');
            $table->unsignedBigInteger('fp_id');
            $table->unsignedBigInteger('fa_id');
            $table->unsignedBigInteger('fc_id');
//            $table->date('date');
            $table->string('photo');
            $table->foreign('fs_id')->references('fu_id')->on('students')->onDelete('cascade');
            $table->foreign('fd_id')->references('fu_id')->on('doctors')->onDelete('cascade');
            $table->foreign('fp_id')->references('fu_id')->on('patients')->onDelete('cascade');
            $table->foreign('fa_id')->references('fu_id')->on('assistants')->onDelete('cascade');
            $table->foreign('fc_id')->references('id')->on('chairs')->onDelete('cascade');
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
