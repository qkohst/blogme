<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FasilitasAcademy extends Model
{
    protected $fillable = [
        'fasilitas_id',
        'academies_id',
    ];

    public function fasilitas()
    {
        return $this->belongsTo('App\Fasilitas');
    }

    public function academies()
    {
        return $this->belongsTo('App\Academy');
    }
}
