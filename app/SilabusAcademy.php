<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SilabusAcademy extends Model
{
    protected $fillable = [
        'academies_id',
        'judul_silabus',
        'nomor_urut',
        'waktu_belajar',
        'deskripsi',
    ];

    public function academies()
    {
        return $this->belongsTo('App\Academy');
    }
}
