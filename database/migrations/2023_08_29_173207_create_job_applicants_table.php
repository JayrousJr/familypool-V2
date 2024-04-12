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
        Schema::create('job_applicants', function (Blueprint $table) {
            $table->id();
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
            $table->string('zip')->index()->nullable();
            $table->string('age')->index()->nullable();
            $table->string('birthdate')->index()->nullable();
            $table->string('socialsecurity')->index()->nullable();
            $table->string('socialsecurityNumber')->index()->default('NULL')->nullable();
            $table->string('einNumber')->index()->default('NULL')->nullable();
            $table->string('days')->index()->nullable();
            $table->string('starttime')->index()->nullable();
            $table->string('endtime')->index()->nullable();
            $table->string('startdate')->index()->nullable();
            $table->string('workperiod')->index()->nullable();
            $table->string('workHours')->index()->nullable();
            $table->string('smoke')->index()->nullable();
            $table->string('licence')->index()->nullable();
            $table->string('licenceNumber')->index()->default('NULL')->nullable();
            $table->string('issueddate')->index()->default('NULL')->nullable();
            $table->string('expiredate')->index()->default('NULL')->nullable();
            $table->string('issuedcity')->index()->default('NULL')->nullable();
            $table->string('transport')->index()->nullable();
            $table->boolean('hire')->default('0');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applicants');
    }
};
