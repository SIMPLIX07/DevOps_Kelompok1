<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SkillCv extends Model
{
    protected $table = 'skill_cvs';

    protected $fillable = [
        'cv_id',
        'skill',
        'kemampuan'
    ];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
