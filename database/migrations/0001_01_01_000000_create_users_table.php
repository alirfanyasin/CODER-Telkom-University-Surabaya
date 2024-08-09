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
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('label');
            $table->rememberToken();
            $table->string('major')->nullable();
            $table->string('nim')->nullable();
            $table->string('batch')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('avatar')->nullable();
            $table->string('github')->nullable();
            $table->string('identity_code')->nullable();
            $table->string('tag')->nullable();
            $table->unsignedBigInteger('division_id')->nullable();
            $table->string('google_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
