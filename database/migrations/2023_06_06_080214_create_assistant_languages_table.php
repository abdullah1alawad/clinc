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
        Schema::create('assistant_languages', function (Blueprint $table) {
            $table->unsignedBigInteger('fa_id');
            $table->string('language_name');
            $table->foreign('fa_id')->references('fu_id')->on('assistants')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assistant_languages');
    }
};
