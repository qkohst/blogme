<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KataKunci extends Model
{
    protected $fillable = [
        'key',
        'jumlah_digunakan'
    ];

    public function kata_kunci_diskusis()
    {
        return $this->hasMany('App\KataKunciDiskusi');
    }
}
