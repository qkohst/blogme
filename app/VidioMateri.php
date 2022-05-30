<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VidioMateri extends Model
{
    protected $fillable = [
        'materi_silabus_id',
        'deskripsi_vidio',
        'embed_vidio'
    ];

    public function materi_silabuses()
    {
        return $this->belongsTo('App\MateriSilabus', 'materi_silabus_id');
    }
}
