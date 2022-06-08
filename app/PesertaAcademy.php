<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaAcademy extends Model
{
    protected $fillable = [
        'academy_id',
        'user_id',
        'bukti_transfer',
        'status',
        'catatan_verifikasi'
    ];

    public function academies()
    {
        return $this->belongsTo('App\Academy', 'academy_id');
    }

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function jawaban_kuis_pesertas()
    {
        return $this->hasMany('App\JawabanKuisPeserta');
    }

    public function jawaban_submission_pesertas()
    {
        return $this->hasMany('App\JawabanSubmissionPeserta');
    }

    public function sertifikat_peserta_academies()
    {
        return $this->hasOne('App\SertifikatPesertaAcademy');
    }

    public function testimoni_academies()
    {
        return $this->hasOne('App\TestimoniAcademy');
    }
}
