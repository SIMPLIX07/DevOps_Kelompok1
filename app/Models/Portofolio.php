<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $fillable = [
        'pelamar_id',
        'judul',
        'kategori',
        'deskripsi',
        'teknologi',
        'link_demo',
        'link_repo',
        'tanggal_mulai',
        'tanggal_selesai',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
