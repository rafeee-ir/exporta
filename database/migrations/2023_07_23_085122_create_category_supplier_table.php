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
        Schema::create('category_supplier', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('category_id');
            $table->unsignedBiginteger('supplier_id');
            $table->foreign('category_id')->references('id')
                ->on('categories')->onDelete('cascade');
            $table->foreign('supplier_id')->references('id')
                ->on('suppliers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category_supplier');
    }
};
