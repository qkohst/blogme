<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifikasiAdmin extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'url',
        'status'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
