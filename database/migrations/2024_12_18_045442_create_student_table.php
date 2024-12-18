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
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('fname'); 
            $table->string('image')->nullable(); 
            $table->string('email')->unique(); 
            $table->string('contact', 10);
            $table->string('course'); 
            $table->enum('gender', ['male', 'female', 'other']); 
            $table->text('address');
            $table->string('hobbies'); 
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
