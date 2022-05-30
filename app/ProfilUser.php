<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProfilUser extends Model
{
    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'headline',
        'tentang_saya'
    ];

    public function users()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
