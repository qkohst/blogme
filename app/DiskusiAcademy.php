<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiskusiAcademy extends Model
{
    protected $fillable = [
        'academies_id',
        'users_id',
        'topik_diskusi',
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
