<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    protected $fillable = [
        'cv_id',
        'tingkat',
        'universitas',
        'jurusan',
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}

