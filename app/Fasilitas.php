<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $fillable = [
        'nama_fasilitas',
        'icon',
        'deskripsi',
    ];

    public function fasilitas_academies()
    {
        return $this->hasMany('App\FasilitasAcademy');
    }
}
