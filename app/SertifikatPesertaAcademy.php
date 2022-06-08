<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SertifikatPesertaAcademy extends Model
{
    protected $fillable = [
        'peserta_academy_id',
        'status',
        'file_sertifikat',
        'catatan_verifikasi',
    ];

    public function peserta_academies()
    {
        return $this->belongsTo('App\PesertaAcademy', 'peserta_academy_id');
    }
}
