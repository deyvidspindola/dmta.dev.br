<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('contact_deliveries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('idempotency_key', 100)->unique();
            $table->string('fingerprint', 64);
            $table->text('payload');
            $table->string('status')->default('pending');
            $table->string('remote_id')->nullable();
            $table->string('provider_id')->nullable();
            $table->unsignedSmallInteger('http_status')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('contact_deliveries');
    }
};
