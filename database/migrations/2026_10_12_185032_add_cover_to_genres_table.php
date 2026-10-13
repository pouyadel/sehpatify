<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('genres', function (Blueprint $table) {
            if (!Schema::hasColumn('genres', 'cover')) {
                $table->string('cover')->nullable()->after('name');
            }
        });
    }

    public function down(): void
    {
        Schema::table('genres', function (Blueprint $table) {
            if (Schema::hasColumn('genres', 'cover')) {
                $table->dropColumn('cover');
            }
        });
    }
};