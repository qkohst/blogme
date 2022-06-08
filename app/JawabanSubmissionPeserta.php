<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JawabanSubmissionPeserta extends Model
{
    protected $fillable = [
        'peserta_academy_id',
        'submission_materi_id',
        'link_jawaban',
        'deskripsi',
        'status',
        'catatan_verifikasi',
        'poin'
    ];

    public function peserta_academies()
    {
        return $this->belongsTo('App\PesertaAcademy', 'peserta_academy_id');
    }

    public function submission_materis()
    {
        return $this->belongsTo('App\SubmissionMateri', 'submission_materi_id');
    }
}
