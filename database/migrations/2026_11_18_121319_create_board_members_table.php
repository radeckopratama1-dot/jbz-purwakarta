<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('board_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->constrained('divisions')->cascadeOnDelete();
            $table->string('full_name');
            $table->string('role_title');
            $table->string('institution')->nullable();
            $table->string('period')->default('2025/2026');
            $table->string('photo_path')->nullable(); // Menyimpan foto pengurus hasil upload CRUD
            $table->string('instagram_handle')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('board_members');
    }
};