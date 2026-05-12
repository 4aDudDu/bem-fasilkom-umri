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
        Schema::create('hero_carousels', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->string('image');
            $table->string('button_text')->nullable();
            $table->string('button_link')->nullable();
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->foreignId('angkatan_bem_id')->constrained()->cascadeOnDelete();
            $table->float('overlay_opacity')->default(0.4);
            $table->timestamps();
            
            $table->index(['angkatan_bem_id', 'order', 'is_active']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_carousels');
    }
};
