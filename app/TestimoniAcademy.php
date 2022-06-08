<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TestimoniAcademy extends Model
{
    protected $fillable = [
        'academy_id',
        'peserta_academy_id',
        'testimoni',
    ];

    public function academies()
    {
        return $this->belongsTo('App\Academy', 'academy_id');
    }

    public function peserta_academies()
    {
        return $this->belongsTo('App\PesertaAcademy', 'peserta_academy_id');
    }
}
