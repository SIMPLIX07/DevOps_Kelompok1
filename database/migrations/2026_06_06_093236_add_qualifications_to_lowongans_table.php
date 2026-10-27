<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->string('pendidikan')->nullable();
            $table->string('pengalaman')->nullable();
            $table->text('keahlian_teknis')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn(['pendidikan', 'pengalaman', 'keahlian_teknis']);
        });
    }
};
