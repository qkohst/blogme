<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'nama_lengkap',
        'email',
        'posisi',
        'mulai_bekerja',
        'deskripsi',
        'foto_profil',
        'twitter',
        'facebook',
        'instagram',
        'linkedin',
    ];
}
