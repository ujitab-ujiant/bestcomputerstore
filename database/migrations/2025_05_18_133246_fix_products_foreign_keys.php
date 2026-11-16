<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
 
    public function up(): void
    {

        $foreignKeys = $this->getForeignKeys('products');

        Schema::table('products', function (Blueprint $table) use ($foreignKeys) {
            if (in_array('products_created_by_foreign', $foreignKeys)) {
                $table->dropForeign('products_created_by_foreign');
            }
            
            if (in_array('products_updated_by_foreign', $foreignKeys)) {
                $table->dropForeign('products_updated_by_foreign');
            }
        });
        
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by')->nullable()->change();
            $table->unsignedBigInteger('updated_by')->nullable()->change();
        });
        
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('created_by', 'products_created_by_foreign')
                ->references('id')->on('users')->onDelete('set null');
            $table->foreign('updated_by', 'products_updated_by_foreign')
                ->references('id')->on('users')->onDelete('set null');
        });
        
        \Log::info("Foreign key untuk products table ditambahkan");
    }


    public function down(): void
    {
        $foreignKeys = $this->getForeignKeys('products');
        
        Schema::table('products', function (Blueprint $table) use ($foreignKeys) {

            if (in_array('products_created_by_foreign', $foreignKeys)) {
                $table->dropForeign('products_created_by_foreign');
            }
            
            if (in_array('products_updated_by_foreign', $foreignKeys)) {
                $table->dropForeign('products_updated_by_foreign');
            }
        });
    }
    
    private function getForeignKeys($tableName)
    {
        $foreignKeys = [];
        
        if (DB::connection()->getDriverName() === 'mysql') {
            $constraints = DB::select("
                SELECT CONSTRAINT_NAME
                FROM information_schema.TABLE_CONSTRAINTS
                WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
                AND TABLE_SCHEMA = DATABASE()
                AND TABLE_NAME = '$tableName'
            ");
            
            foreach ($constraints as $constraint) {
                $foreignKeys[] = $constraint->CONSTRAINT_NAME;
            }
        }
        
        return $foreignKeys;
    }
};