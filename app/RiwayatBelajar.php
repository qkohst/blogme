<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatBelajar extends Model
{
    protected $fillable = [
        'user_id',
        'materi_silabus_id',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function materi_silabuses()
    {
        return $this->belongsTo('App\MateriSilabus', 'materi_silabus_id');
    }
}
