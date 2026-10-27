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
    Schema::create('lowongans', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('perusahaan_id');
        $table->string('kategori_pekerjaan');
        $table->string('posisi_pekerjaan');
        $table->string('jenis_pekerjaan'); 
        $table->string('gaji');
        $table->text('deskripsi_singkat');
        $table->longText('deskripsi_pekerjaan');
        $table->longText('syarat');
        $table->string('provinsi');
        $table->string('kabupaten');
        $table->string('kecamatan');
        $table->string('alamat_lengkap');
        $table->date('tanggal_mulai');
        $table->date('tanggal_berakhir');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lowongans');
    }
};
