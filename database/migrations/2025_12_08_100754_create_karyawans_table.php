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
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pelamar');
            $table->unsignedBigInteger('id_lowongan');
            $table->unsignedBigInteger('id_perusahaan');
            $table->string('kategori_pekerjaan');      
            $table->string('posisi')->nullable();       
            $table->date('tanggal_mulai')->nullable();
            $table->string('status_karyawan')->default('aktif');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};
