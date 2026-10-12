<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            if (!Schema::hasColumn('tracks', 'search_keywords')) {
                $table->text('search_keywords')->nullable()->after('genre');
            }
        });

        Schema::table('artists', function (Blueprint $table) {
            if (!Schema::hasColumn('artists', 'search_keywords')) {
                $table->text('search_keywords')->nullable()->after('bio');
            }
        });
    }

    public function down(): void
    {
        Schema::table('tracks', function (Blueprint $table) {
            if (Schema::hasColumn('tracks', 'search_keywords')) {
                $table->dropColumn('search_keywords');
            }
        });

        Schema::table('artists', function (Blueprint $table) {
            if (Schema::hasColumn('artists', 'search_keywords')) {
                $table->dropColumn('search_keywords');
            }
        });
    }
};