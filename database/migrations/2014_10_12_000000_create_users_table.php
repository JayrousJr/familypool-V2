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
            $table->string('name')->index();
            $table->string('email')->unique();
            $table->string('profile_photo_path', 2048)->default("profile-photos/profile.jpg")->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('nationality')->index()->nullable();
            $table->string('city')->index()->nullable();
            $table->string('state')->index()->nullable();
            $table->string('street')->index()->nullable();
            $table->string('phone')->index()->nullable();
            $table->string('password');
            $table->boolean('team_member')->default('0');
            $table->string('role')
                ->default('User')
                ->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
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
