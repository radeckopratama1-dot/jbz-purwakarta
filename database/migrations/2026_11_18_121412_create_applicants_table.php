<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->id();
            $table->string('registration_code')->unique();
            $table->string('full_name');
            $table->string('email');
            $table->string('whatsapp');
            $table->string('institution');
            $table->foreignId('first_choice_division_id')->constrained('divisions')->cascadeOnDelete();
            $table->foreignId('second_choice_division_id')->nullable()->constrained('divisions')->nullOnDelete();
            $table->string('portfolio_url')->nullable();
            $table->string('cv_file_path')->nullable(); // Opsional jika pendaftar mengunggah file CV/Portofolio
            $table->text('motivation');
            $table->string('status')->default('Menunggu Verifikasi');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};