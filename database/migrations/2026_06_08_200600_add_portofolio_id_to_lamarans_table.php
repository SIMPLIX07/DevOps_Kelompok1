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
        Schema::table('lamarans', function (Blueprint $table) {
            $table->unsignedBigInteger('portofolio_id')->nullable()->after('cv_id');

            $table->foreign('portofolio_id')
                ->references('id')
                ->on('portofolios')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lamarans', function (Blueprint $table) {
            $table->dropForeign(['portofolio_id']);
            $table->dropColumn('portofolio_id');
        });
    }
};
