<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('programs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('pillar'); // Lingkungan, Kemanusiaan, Pendidikan, Media & Kreatif
            $table->string('location');
            $table->date('event_date')->nullable();
            $table->string('status')->default('Terlaksana');
            $table->text('summary');
            $table->longText('content')->nullable();
            $table->string('cover_image')->nullable(); // Menyimpan foto sampul program hasil upload CRUD
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('programs');
    }
};