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
        Schema::create('service_orders', function (Blueprint $table) {
            $table->id();
            $table->string('service_code')->unique();
            $table->string('customer_name');
            $table->string('laptop_name');
            $table->string('laptop_type');
            $table->text('problem_description');
            $table->enum('status', ['pending', 'process', 'completed', 'cancelled'])->default('pending');
            $table->decimal('price', 10, 2)->nullable();
            $table->text('service_note')->nullable();
            $table->foreignId('technician_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_orders');
    }
};