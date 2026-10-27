<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pelamar_id');
            $table->unsignedBigInteger('lowongan_id');
            $table->timestamps();

            $table->foreign('pelamar_id')->references('id')->on('pelamars')->onDelete('cascade');
            $table->foreign('lowongan_id')->references('id')->on('lowongans')->onDelete('cascade');
            $table->unique(['pelamar_id', 'lowongan_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookmarks');
    }
};
