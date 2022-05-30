<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SilabusAcademy extends Model
{
    protected $fillable = [
        'academy_id',
        'judul_silabus',
        'waktu_belajar',
        'deskripsi',
    ];

    public function academies()
    {
        return $this->belongsTo('App\Academy', 'academy_id');
    }

    public function materi_silabuses()
    {
        return $this->hasMany('App\MateriSilabus');
    }
}
