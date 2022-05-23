<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DataPribadiUser extends Model
{
    protected $fillable = [
        'users_id',
        'nomor_telepon',
        'kota_domisili',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'pendidikan_terakhir',
        'pekerjaan',
        'institusi_tempat_bekerja'
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
