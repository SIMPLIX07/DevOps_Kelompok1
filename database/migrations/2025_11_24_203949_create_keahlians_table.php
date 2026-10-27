<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('keahlians', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelamar_id');
            $table->string('nama_keahlian');
            $table->string('deskripsi')->nullable();
            $table->integer('tingkat_kemampuan')->default(1);
            $table->timestamps();

            $table->foreign('pelamar_id')->references('id')->on('pelamars')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('keahlians');
    }
};
