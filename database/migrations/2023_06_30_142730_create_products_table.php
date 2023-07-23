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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('title');
            $table->string('featured_image')->nullable();
            $table->string('slider_images')->nullable();
            $table->string('slug');
            $table->text('description')->nullable();
            $table->integer('supplier_id')->default(1);
            $table->string('minimum_order_qty')->nullable();
            $table->string('production_capacity')->nullable();
            $table->string('sample')->nullable();
            $table->integer('price_fob')->nullable();
            $table->string('price_currency')->default('USD')->nullable();
            $table->boolean('published')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
