<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lamaran extends Model
{
    protected $fillable = [
        'pelamar_id',
        'lowongan_id',
        'status',
        'cv_id',
        'portofolio_id',
        'popup_diterima_tampil',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class, 'pelamar_id');
    }

    public function lowongan()
    {
        return $this->belongsTo(Lowongan::class, 'lowongan_id');
    }

    public function cv()
    {
        return $this->belongsTo(Cv::class, 'cv_id');
    }

    public function portofolio()
    {
        return $this->belongsTo(Portofolio::class, 'portofolio_id');
    }
}
