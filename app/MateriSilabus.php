<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriSilabus extends Model
{
    protected $fillable = [
        'silabus_academies_id',
        'tipe_materi',
        'tipe_pembaca',
        'nomor_urut',
        'judul_materi'
    ];

    public function silabus_academies()
    {
        return $this->belongsTo('App\SilabusAcademy');
    }

    public function artikel_materis()
    {
        return $this->hasOne('App\ArtikelMateri');
    }
}
