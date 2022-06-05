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
}
