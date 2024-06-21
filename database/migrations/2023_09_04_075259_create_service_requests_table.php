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
        Schema::create('service_requests', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('client_id')->constrained('clients')->nullOnDelete();
            $table->string('name')->index();
            $table->string('email')->index();
            $table->string('zip')->index();
            $table->string('phone')->index();
            $table->string('service')->index();
            $table->string('description', 1500);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_requests');
    }
};
