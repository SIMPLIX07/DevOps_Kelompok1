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
        Schema::table('wawancaras', function (Blueprint $table) {
            $table->string('catatan_reschedule', 500)->nullable()->after('pesan');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wawancaras', function (Blueprint $table) {
            $table->dropColumn('catatan_reschedule');
        });
    }
};

