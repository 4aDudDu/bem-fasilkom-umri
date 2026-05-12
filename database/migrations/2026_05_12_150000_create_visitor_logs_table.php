<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visitor_logs', function (Blueprint $table) {
            $table->id();
            $table->string('ip_address')->nullable();
            $table->string('user_agent')->nullable();
            $table->string('referer')->nullable();
            $table->string('page_url');
            $table->string('page_title')->nullable();
            $table->integer('session_duration')->default(0); // in seconds
            $table->string('device_type')->nullable(); // desktop, tablet, mobile
            $table->string('browser')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->timestamps();
            
            $table->index('created_at');
            $table->index('page_url');
            $table->index(['ip_address', 'created_at']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('visitor_logs');
    }
};
