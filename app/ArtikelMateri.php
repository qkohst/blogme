<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArtikelMateri extends Model
{
    protected $fillable = [
        'materi_silabus_id',
        'isi_materi',
    ];

    public function materi_silabuses()
    {
        return $this->belongsTo('App\MateriSilabus', 'materi_silabus_id');
    }
}
