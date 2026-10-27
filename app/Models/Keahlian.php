<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Keahlian extends Model
{
    protected $fillable = [
        'pelamar_id',
        'nama_keahlian',
        'deskripsi',
        'tingkat_kemampuan'
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
