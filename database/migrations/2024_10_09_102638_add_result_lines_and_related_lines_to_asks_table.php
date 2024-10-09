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
        Schema::table('asks', function (Blueprint $table) {
            $table->string('result_lines')->default('1,1,1,1,1,1')->after('related');
            $table->string('related_lines')->default('1,1,1,1,1,1')->after('result_lines');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asks', function (Blueprint $table) {
            $table->dropColumn('result_lines');
            $table->dropColumn('related_lines');
        });
    }
};
