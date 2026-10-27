<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            if (Schema::hasColumn('cvs', 'universitas')) {
                $table->dropColumn('universitas');
            }

            if (Schema::hasColumn('cvs', 'jurusan')) {
                $table->dropColumn('jurusan');
            }

            if (Schema::hasColumn('cvs', 'pendidikan')) {
                $table->dropColumn('pendidikan');
            }
        });
    }

    public function down(): void
    {
        Schema::table('cvs', function (Blueprint $table) {
            $table->string('universitas')->nullable();
            $table->string('jurusan')->nullable();
            $table->string('pendidikan')->nullable();
        });
    }
};
