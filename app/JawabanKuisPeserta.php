<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanKuisPeserta extends Model
{
    protected $fillable = [
        'peserta_academy_id',
        'kuis_materi_id',
        'jawaban',
        'poin',
    ];

    public function peserta_academies()
    {
        return $this->belongsTo('App\PesertaAcademy', 'peserta_academy_id');
    }

    public function kuis_materis()
    {
        return $this->belongsTo('App\KuisMateri', 'kuis_materi_id');
    }
}
