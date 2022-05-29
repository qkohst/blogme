<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RekeningBank extends Model
{
    protected $fillable = [
        'nama_bank',
        'nomor_rekening',
        'nama_pemilik',
        'gambar',
    ];
}
