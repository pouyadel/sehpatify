<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('albums', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->foreignId('artist_id')->nullable()->constrained('artists')->nullOnDelete();
            $table->string('genre')->nullable();
            $table->string('release_year')->nullable();
            $table->string('cover')->nullable();
            $table->text('description')->nullable();
            $table->text('search_keywords')->nullable();
            $table->timestamps();
        });

        Schema::table('tracks', function (Blueprint $table) {
            if (!Schema::hasColumn('tracks', 'album_id')) {
                $table->foreignId('album_id')->nullable()->after('artist_id')->constrained('albums')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            if (Schema::hasColumn('tracks', 'album_id')) {
                $table->dropForeign(['album_id']);
                $table->dropColumn('album_id');
            }
        });
        Schema::dropIfExists('albums');
    }
};