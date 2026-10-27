<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cv extends Model
{
    protected $table = 'cvs';
    protected $fillable = [
        
        'pelamar_id',
        'umur',
        'tentang_saya',
        'kontak',
        'title',
        'subtitle',
    ];

    public function pelamar()
    {
        return $this->belongsTo(Pelamar::class);
    }


    public function pendidikans()
    {
        return $this->hasMany(Pendidikan::class);
    }

    public function skills()
    {
        return $this->hasMany(SkillCv::class);
    }

    public function pengalamans()
    {
        return $this->hasMany(Pengalaman::class);
    }
}
