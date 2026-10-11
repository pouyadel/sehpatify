<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artist_track', function (Blueprint $table) {
            $table->id();
            $table->foreignId('track_id')->constrained()->cascadeOnDelete();
            $table->foreignId('artist_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });

        // انتقال خوانندگان آهنگ‌های قبلی به جدول جدید
        if (Schema::hasColumn('tracks', 'artist_id')) {
            $tracks = DB::table('tracks')->whereNotNull('artist_id')->get();
            foreach ($tracks as $track) {
                DB::table('artist_track')->insertOrIgnore([
                    'track_id' => $track->id,
                    'artist_id' => $track->artist_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('artist_track');
    }
};