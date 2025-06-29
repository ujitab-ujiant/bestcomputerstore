<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->text('description');
                $table->string('short_description')->nullable();
                $table->decimal('price', 10, 2);
                $table->decimal('discounted_price', 10, 2)->nullable();
                $table->string('category');
                $table->string('subcategory')->nullable();
                $table->string('brand');
                $table->string('image');
                $table->string('marketplace_shopee')->nullable();
                $table->string('marketplace_tokopedia')->nullable();
                $table->string('sku')->nullable();
                $table->string('code')->nullable();
                $table->decimal('weight', 8, 2)->nullable(); 
                $table->enum('status', ['active', 'inactive'])->default('active');
                $table->boolean('featured')->default(false);
                $table->foreignId('created_by')->nullable()->constrained('users')->onDelete('set null');
                $table->foreignId('updated_by')->nullable()->constrained('users')->onDelete('set null');
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};