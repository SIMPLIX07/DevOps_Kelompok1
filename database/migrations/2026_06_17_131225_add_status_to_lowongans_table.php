<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->enum('status', ['aktif', 'ditutup'])->default('aktif')->after('tanggal_berakhir');
        });
    }

    public function down()
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
