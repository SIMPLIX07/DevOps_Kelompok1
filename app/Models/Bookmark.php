<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $fillable = ['pelamar_id', 'lowongan_id'];

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class);
    }

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }
}
