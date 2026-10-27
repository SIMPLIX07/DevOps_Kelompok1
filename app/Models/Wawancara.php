<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wawancara extends Model
{
    use HasFactory;

    protected $table = 'wawancaras';

    protected $fillable = [
        'pelamar_id',
        'perusahaan_id',
        'lowongan_id',
        'status',
        'jam_mulai',
        'jam_selesai',
        'tanggal',
        'link_meet',
        'pesan',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }
}
