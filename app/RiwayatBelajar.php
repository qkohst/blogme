<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RiwayatBelajar extends Model
{
    protected $fillable = [
        'users_id',
        'materi_silabuses_id',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function materi_silabuses()
    {
        return $this->belongsTo('App\MateriSilabus');
    }
}
