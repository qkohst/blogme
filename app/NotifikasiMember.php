<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NotifikasiMember extends Model
{
    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'judul',
        'url',
        'status'
    ];

    public function from_users()
    {
        return $this->belongsTo('App\User', 'from_user_id');
    }
    
    public function to_users()
    {
        return $this->belongsTo('App\User', 'to_user_id');
    }
}
