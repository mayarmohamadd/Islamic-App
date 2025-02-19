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
        Schema::create('evening_azkars', function (Blueprint $table) {
            $table->id();
            $table->text('text');
            $table->integer('count');
            $table->integer('original_count')->nullable();
            $table ->boolean('like')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evening_azkars');
    }
};
