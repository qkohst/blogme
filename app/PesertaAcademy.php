<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PesertaAcademy extends Model
{
    protected $fillable = [
        'academies_id',
        'users_id',
        'bukti_transfer',
        'status'
    ];

    public function academies()
    {
        return $this->belongsTo('App\Academy');
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
