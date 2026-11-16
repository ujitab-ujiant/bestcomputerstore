<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('service_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->nullable()->after('technician_id');
            $table->string('customer_phone', 20)->nullable()->after('customer_name');
            $table->integer('warranty_duration_days')->nullable()->after('service_note');
            $table->text('warranty_note')->nullable()->after('warranty_duration_days');
            $table->date('warranty_start_date')->nullable()->after('warranty_note');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
        });
    }

    public function down(): void
    {
        Schema::table('service_orders', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'customer_phone', 'warranty_duration_days', 'warranty_note', 'warranty_start_date']);
        });
    }
};
