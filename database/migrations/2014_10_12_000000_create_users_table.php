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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('fname');
            $table->string('mname');
            $table->string('lname');
            $table->string('mother_name');
            $table->date('birth_date');
            $table->string('birth_location');
            $table->string('national_id');
            $table->string('constraint');
            $table->string('gender');
            $table->string('address');
            $table->boolean('sieve');
            $table->string('phone')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
