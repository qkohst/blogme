<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TechnologyAcademy extends Model
{
    protected $fillable = [
        'technologies_id',
        'academies_id',
    ];

    public function technologies()
    {
        return $this->belongsTo('App\Technology');
    }

    public function academies()
    {
        return $this->belongsTo('App\Academy');
    }
}
