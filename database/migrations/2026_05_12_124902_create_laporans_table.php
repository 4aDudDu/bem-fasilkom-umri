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
        Schema::create('laporans', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nim')->nullable();
            $table->string('email');
            $table->string('kategori_laporan'); // akademik, fasilitas, organisasi, layanan, lainnya
            $table->text('isi_laporan');
            $table->string('bukti')->nullable();
            $table->string('status')->default('pending'); // pending, diproses, selesai, ditolak
            $table->timestamp('noted_at')->nullable();
            $table->unsignedBigInteger('noted_by')->nullable(); // user id
            $table->text('catatan_admin')->nullable();
            $table->string('discord_message_id')->nullable();
            $table->timestamps();
            
            $table->index('status');
            $table->index('kategori_laporan');
            $table->index('email');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('laporans');
    }
};
