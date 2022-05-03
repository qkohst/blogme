<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'alamat',
        'email',
        'nomor_telpon',
        'embed_google_maps',
        'link_telegram',
        'link_twitter',
        'link_facebook',
        'link_instagram',
        'link_youtube'
    ];
}
