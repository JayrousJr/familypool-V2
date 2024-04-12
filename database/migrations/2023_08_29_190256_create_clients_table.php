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
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->UnsignedBigInteger('user_id');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('name')->index();
            $table->foreign('name')
                ->references('name')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('email')->unique();
            $table->foreign('email')
                ->references('email')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('nationality')->index()->nullable();
            $table->foreign('nationality')
                ->references('nationality')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('city')->index()->nullable();
            $table->foreign('city')
                ->references('city')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('state')->index()->nullable();
            $table->foreign('state')
                ->references('state')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('street')->index()->nullable();
            $table->foreign('street')
                ->references('street')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('phone')->index()->nullable();
            $table->foreign('phone')
                ->references('phone')
                ->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->string('category')->index()->nullable();
            $table->foreign('category')
                ->references('category')
                ->on('client_categories')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->boolean('active')
                ->default('0');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};
