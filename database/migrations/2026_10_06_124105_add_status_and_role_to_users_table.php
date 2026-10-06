<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('کاربر')->after('email'); // نقش کاربری
            $table->string('plan')->default('رایگان')->after('role'); // سطح اشتراک
            $table->boolean('is_active')->default(true)->after('plan'); // وضعیت مسدود/فعال
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'plan', 'is_active']);
        });
    }
};