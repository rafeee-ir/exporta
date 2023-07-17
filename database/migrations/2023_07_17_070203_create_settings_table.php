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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('logo')->nullable();
            $table->boolean('can_login')->nullable();
            $table->boolean('can_register')->nullable();
            $table->boolean('has_favorite')->nullable();
            $table->string('main_banner_subtitle')->nullable();
            $table->text('main_banner_text')->nullable();
            $table->string('main_banner_button_text')->nullable();
            $table->string('main_banner_image')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
