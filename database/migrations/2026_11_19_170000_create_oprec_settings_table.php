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
        Schema::create('oprec_settings', function (Blueprint $table) {
            $table->id();
            $table->string('batch_name')->default('Open Recruitment JBZ Kabupaten Purwakarta 2026');
            $table->boolean('is_open')->default(true);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->text('timeline_text')->nullable();
            $table->text('closed_message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oprec_settings');
    }
};
