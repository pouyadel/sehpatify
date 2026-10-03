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
        Schema::create('tracks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('artist');
            $table->foreignId('artist_id')->nullable()->constrained()->nullOnDelete();
            $table->string('album')->nullable();
            $table->string('duration')->default('03:30');
            $table->unsignedInteger('duration_sec')->default(210);
            $table->text('cover')->nullable();
            $table->string('audio_path')->nullable();
            $table->string('genre')->nullable();
            $table->string('mood')->nullable();
            $table->boolean('is_lossless')->default(true);
            $table->unsignedBigInteger('streams')->default(0);
            $table->json('lyrics')->nullable(); // نگهداری آرایه خطوط و زمان لیریکس
            $table->boolean('favorited')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tracks');
    }
};
