<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lowongan extends Model
{
    protected $fillable = [
        'perusahaan_id',
        'kategori_pekerjaan',
        'posisi_pekerjaan',
        'jenis_pekerjaan',
        'gaji',
        'deskripsi_singkat',
        'deskripsi_pekerjaan',
        'syarat',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'alamat_lengkap',
        'tanggal_mulai',
        'tanggal_berakhir',
        'pendidikan',
        'pengalaman',
        'keahlian_teknis',
    ];
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'lowongan_id');
    }
    
    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
