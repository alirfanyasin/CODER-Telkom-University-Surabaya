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
        Schema::create('user_answer_quizzes', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('score');
            $table->string('grade');
            $table->unsignedInteger('correct_answer')->nullable();
            $table->unsignedInteger('wrong_answer')->nullable();
            $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_answer_quizzes');
    }
};
