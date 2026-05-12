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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nim')->nullable();
            $table->string('photo')->nullable();
            $table->string('jabatan'); // Ketua, Sekretaris, Bendahara, Kepala Divisi, Anggota, dll
            $table->foreignId('division_id')->constrained()->cascadeOnDelete();
            $table->foreignId('angkatan_bem_id')->constrained()->cascadeOnDelete();
            $table->string('instagram')->nullable();
            $table->string('email')->nullable();
            $table->text('bio')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
            
            $table->index(['division_id', 'order']);
            $table->index(['angkatan_bem_id', 'jabatan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
