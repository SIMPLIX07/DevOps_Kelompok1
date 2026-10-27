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
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id();

            $table->foreignId('perusahaan_id')
                ->constrained('perusahaans')
                ->onDelete('cascade');

            $table->foreignId('pelamar_id')
                ->nullable()
                ->unique()
                ->constrained('pelamars')
                ->onDelete('set null');

            $table->string('posisi');
            $table->string('gaji')->nullable();
            $table->text('deskripsi_pekerjaan')->nullable();
            $table->json('list_pekerjaan')->nullable();
            $table->string('lokasi')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pekerjaans');
    }
};
