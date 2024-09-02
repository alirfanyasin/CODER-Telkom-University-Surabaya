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
        Schema::create('meetings', function (Blueprint $table) {
            $table->id();
            $table->string("slug")->unique();
            $table->string("name");
            $table->dateTime("date_time");
            $table->dateTime("end_time")->nullable();
            $table->enum("type", ["online", "offline"]);
            $table->string("link")->nullable();
            $table->string("location")->nullable();
            $table->string("description");
            $table->enum("status", ["aktif", "selesai", "berlangsung"]);
            $table->unsignedBigInteger("division_id");
            $table->foreign('division_id')->references('id')->on('divisions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meetings');
    }
};
