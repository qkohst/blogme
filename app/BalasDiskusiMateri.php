<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BalasDiskusiMateri extends Model
{
    protected $fillable = [
        'user_id',
        'diskusi_materi_id',
        'komentar',
        'status',
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function diskusi_materis()
    {
        return $this->belongsTo('App\DiskusiMateri', 'diskusi_materi_id');
    }
}
