<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengalaman extends Model
{
    protected $table = 'pengalamen';

    protected $fillable = [
        'cv_id',
        'pengalaman',
        'durasi'
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
