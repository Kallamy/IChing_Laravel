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
        Schema::create('hexagrams', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->string('symbol');
            $table->string('title');
            $table->string('upper_trigram');
            $table->string('bottom_trigram');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hexagrams');
    }
};
