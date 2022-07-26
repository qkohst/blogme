<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MateriSilabus extends Model
{
    protected $fillable = [
        'silabus_academy_id',
        'tipe_materi',
        'tipe_pembaca',
        'judul_materi'
    ];

    public function silabus_academies()
    {
        return $this->belongsTo('App\SilabusAcademy', 'silabus_academy_id');
    }

    public function artikel_materis()
    {
        return $this->hasOne('App\ArtikelMateri');
    }

    public function vidio_materis()
    {
        return $this->hasOne('App\VidioMateri');
    }

    public function kuis_materis()
    {
        return $this->hasMany('App\KuisMateri');
    }

    public function submission_materis()
    {
        return $this->hasOne('App\SubmissionMateri');
    }

    public function riwayat_belajars()
    {
        return $this->hasMany('App\RiwayatBelajar');
    }

    public function laporan_materis()
    {
        return $this->hasMany('App\LaporanMateri');
    }

    public function diskusi_materis()
    {
        return $this->hasMany('App\DiskusiMateri');
    }
}
