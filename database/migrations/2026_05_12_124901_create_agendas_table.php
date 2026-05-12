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
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->string('poster')->nullable();
            $table->string('lokasi')->nullable();
            $table->dateTime('waktu_mulai');
            $table->dateTime('waktu_selesai')->nullable();
            $table->string('registrasi_link')->nullable();
            $table->foreignId('angkatan_bem_id')->constrained()->cascadeOnDelete();
            $table->boolean('is_published')->default(true);
            $table->timestamps();
            
            $table->index('slug');
            $table->index(['angkatan_bem_id', 'waktu_mulai']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
