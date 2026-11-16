<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Modify the role enum to include 'pelanggan'
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin','teknisi','pelanggan') DEFAULT 'teknisi'");

        // Add phone column if it doesn't exist
        if (!Schema::hasColumn('users', 'phone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->string('phone', 20)->nullable()->after('email');
            });
        }
    }

    public function down(): void
    {
        // Revert enum back to original
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin','teknisi') DEFAULT 'teknisi'");

        if (Schema::hasColumn('users', 'phone')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('phone');
            });
        }
    }
};
