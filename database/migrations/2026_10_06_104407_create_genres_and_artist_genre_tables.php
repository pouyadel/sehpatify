<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // ۱. جدول سبک‌ها / ژانرهای موسیقی
        Schema::create('genres', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
        });

        // ۲. جدول واسط چند-به-چند هنرمند و سبک‌ها
        Schema::create('artist_genre', function (Blueprint $table) {
            $table->id();
            $table->foreignId('artist_id')->constrained('artists')->cascadeOnDelete();
            $table->foreignId('genre_id')->constrained('genres')->cascadeOnDelete();
            $table->timestamps();
        });

        // ۳. افزودن فیلدهای بیوگرافی و اسلاگ به جدول هنرمندان
        Schema::table('artists', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('name');
            $table->text('bio')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('artists', function (Blueprint $table) {
            $table->dropColumn(['slug', 'bio']);
        });
        Schema::dropIfExists('artist_genre');
        Schema::dropIfExists('genres');
    }
};