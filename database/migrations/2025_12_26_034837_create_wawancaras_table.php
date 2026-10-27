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
        Schema::create('wawancaras', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('pelamar_id');
            $table->unsignedBigInteger('perusahaan_id');
            $table->unsignedBigInteger('lowongan_id');

            $table->string('status');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->date('tanggal');
            $table->string('link_meet')->nullable();
            $table->text('pesan')->nullable();

            $table->timestamps();

            $table->foreign('pelamar_id')
                ->references('id')
                ->on('pelamars')
                ->onDelete('cascade');

            $table->foreign('perusahaan_id')
                ->references('id')
                ->on('perusahaans')
                ->onDelete('cascade');

            $table->foreign('lowongan_id')
                ->references('id')
                ->on('lowongans')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wawancaras');
    }
};
