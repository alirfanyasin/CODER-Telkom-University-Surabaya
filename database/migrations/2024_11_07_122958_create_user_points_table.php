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
        Schema::create('user_points', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_presence_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('user_answer_quizzes_id')->nullable()->constrained()->onDelete('cascade');
            $table->foreignId('task_submission_id')->nullable()->constrained()->onDelete('cascade');
            $table->unsignedInteger('final_project')->nullable();
            $table->unsignedInteger('commitee')->nullable();
            $table->unsignedInteger('points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_points');
    }
};
