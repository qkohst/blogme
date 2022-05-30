<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FasilitasAcademy extends Model
{
    protected $fillable = [
        'fasilitas_id',
        'academy_id',
    ];

    public function fasilitas()
    {
        return $this->belongsTo('App\Fasilitas', 'fasilitas_id');
    }

    public function academies()
    {
        return $this->belongsTo('App\Academy', 'academy_id');
    }
}
