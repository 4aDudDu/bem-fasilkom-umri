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
    Schema::create('beritas', function (Blueprint $table) {
        $table->id();
        $table->foreignId('angkatan_bem_id')->constrained()->cascadeOnDelete();
        $table->foreignId('author_id')->constrained('users');
        $table->foreignId('category_id')->constrained();
        $table->string('title');
        $table->string('slug')->unique();
        $table->string('thumbnail');
        $table->text('description');
        $table->longText('content');
        $table->integer('views')->default(0);
        $table->boolean('is_published')->default(true);
        $table->timestamp('published_at')->nullable();
        $table->json('tags')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('beritas');
    }
};
