<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    protected $fillable = [
        'nama_teknologi',
        'icon',
    ];

    public function technology_academies()
    {
        return $this->hasMany('App\TechnologyAcademy');
    }
}
