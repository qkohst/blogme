<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategory extends Model
{
    protected $fillable = [
        'nama_kategori',
        'gambar',
        'deskripsi',
        'status',
    ];

    public function academies()
    {
        return $this->hasMany('App\Academy');
    }
}
