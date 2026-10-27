<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'username',
        'email',
        'no_telp',
        'password',
        'foto_profil',
        'firebase_uid'
    ];

    public function keahlians()
    {
        return $this->hasMany(Keahlian::class, 'pelamar_id');
    }
    public function lamarans()
    {
        return $this->hasMany(Lamaran::class, 'pelamar_id');
    }
    public function cv()
    {
        return $this->hasMany(Cv::class);
    }

    public function portofolios()
    {
        return $this->hasMany(Portofolio::class);
    }
    public function wawancaras()
    {
        return $this->hasMany(Wawancara::class);
    }
}
