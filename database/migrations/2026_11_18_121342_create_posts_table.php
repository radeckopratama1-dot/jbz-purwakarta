<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('division_id')->nullable()->constrained('divisions')->nullOnDelete();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('type')->default('Galeri PDD'); // Galeri PDD, Berita, Siaran Pers
            $table->string('author_name')->default('Tim PDD JBZ Purwakarta');
            $table->text('excerpt');
            $table->longText('body')->nullable();
            $table->string('image_path')->nullable(); // Menyimpan foto dokumentasi PDD / berita hasil upload CRUD
            $table->timestamp('published_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};