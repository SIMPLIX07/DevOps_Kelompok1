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
        Schema::create('pelamar_keahlian', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pelamar_id')
                ->constrained('pelamars')
                ->onDelete('cascade');

            $table->foreignId('keahlian_id')
                ->constrained('keahlians')
                ->onDelete('cascade');

            $table->timestamps();

            $table->unique(['pelamar_id', 'keahlian_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelamar_keahlian');
    }
};
