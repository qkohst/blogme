<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KataKunciDiskusi extends Model
{
    protected $fillable = [
        'diskusi_materi_id',
        'kata_kunci_id',
    ];

    public function diskusi_materis()
    {
        return $this->belongsTo('App\DiskusiMateri', 'diskusi_materi_id');
    }

    public function kata_kuncis()
    {
        return $this->belongsTo('App\KataKunci', 'kata_kunci_id');
    }
}
