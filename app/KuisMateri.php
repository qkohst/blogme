<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KuisMateri extends Model
{
    protected $fillable = [
        'materi_silabus_id',
        'soal',
        'jawaban_a',
        'jawaban_b',
        'jawaban_c',
        'jawaban_d',
        'kunci_jawaban',
        'poin',
    ];

    public function materi_silabuses()
    {
        return $this->belongsTo('App\MateriSilabus', 'materi_silabus_id');
    }

    public function jawaban_kuis_pesertas()
    {
        return $this->hasMany('App\JawabanKuisPeserta');
    }
}
