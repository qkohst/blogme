<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academy extends Model
{
    protected $fillable = [
        'kategories_id',
        'nama_kelas',
        'gambar',
        'level',
        'deskripsi',
        'minimum_ram',
        'minimum_layar',
        'minimum_sistem_operasi',
        'minimum_processor',
        'status',
    ];

    public function kategories()
    {
        return $this->belongsTo('App\Kategory');
    }

    public function fasilitas_academies()
    {
        return $this->hasMany('App\FasilitasAcademy');
    }

    public function tools_academies()
    {
        return $this->hasMany('App\ToolsAcademy');
    }

    public function technology_academies()
    {
        return $this->hasMany('App\TechnologyAcademy');
    }

    public function silabus_academies()
    {
        return $this->hasMany('App\SilabusAcademy');
    }
}
